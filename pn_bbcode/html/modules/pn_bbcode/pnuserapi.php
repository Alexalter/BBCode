<?php
// ----------------------------------------------------------------------
// PostNuke Content Management System
// Copyright (C) 2001 by the PostNuke Development Team.
// http://www.postnuke.com/
// ----------------------------------------------------------------------
// Based on:
// PHP-NUKE Web Portal System - http://phpnuke.org/
// Thatware - http://thatware.org/
// ----------------------------------------------------------------------
// LICENSE
//
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License (GPL)
// as published by the Free Software Foundation; either version 2
// of the License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// To read the license please visit http://www.gnu.org/copyleft/gpl.html
// ----------------------------------------------------------------------
// Original Author of file: Hinrich Donner
// changed to pn_bbcode: larsneo
// ----------------------------------------------------------------------

/**
 * @package PostNuke_Utility_Modules
 * @subpackage pn_bbcode
 * @credits to Bravecobra for the phps function (webmaster@bravecobra.com)
 * @license http://www.gnu.org/copyleft/gpl.html
*/

/**
 * the hook function
*/
function pn_bbcode_userapi_transform($args) 
{
    extract($args);

    // Argument check
    if ((!isset($objectid)) ||
        (!isset($extrainfo))) {
        pnSessionSetVar('errormsg', _PNBBCODE_ARGSERROR);
        return;
    }

    if (is_array($extrainfo)) {
        foreach ($extrainfo as $text) {
            $result[] = pn_bbcode_transform($text);
        }
    } else {
        $result = pn_bbcode_transform($extrainfo);
    }

    return $result;
}

/**
 * the wrapper for a string var (simple up to now)
*/
function pn_bbcode_transform($text) 
{
    $message = pn_bbcode_encode($text, $is_html_disabled=false);
    return $message;
}


/**
 * bbdecode/bbencode functions:
 * Rewritten - Nathan Codding - Aug 24, 2000
 * quote, code, and list rewritten again in Jan. 2001.
 * All BBCode tags now implemented. Nesting and multiple occurances should be 
 * handled fine for all of them. Using str_replace() instead of regexps often
 * for efficiency. quote, list, and code are not regular, so they are 
 * implemented as PDAs - probably not all that efficient, but that's the way it is. 
 *
 * Note: all BBCode tags are case-insensitive.
 *
 * some changes for PostNuke: larsneo - Jan, 12, 2003
 * different [img] tag conversion against XSS
 */
function pn_bbcode_encode($message, $is_html_disabled) 
{
	// pad it with a space so we can distinguish between FALSE and matching the 1st char (index 0).
	// This is important; bbencode_quote(), bbencode_list(), and bbencode_code() all depend on it.
	$message = " " . $message;
	
	// First: If there isn't a "[" and a "]" in the message, don't bother.
	if (! (strpos($message, "[") && strpos($message, "]")) ) {
		// Remove padding, return.
		$message = substr($message, 1);
		return $message;	
	}

	// [CODE] and [/CODE] for posting code (HTML, PHP, C etc etc) in your posts.
	$message = pn_bbcode_encode_code($message, $is_html_disabled);

	// [QUOTE] and [/QUOTE] for posting replies with quote, or just for quoting stuff.	
	$message = pn_bbcode_encode_quote($message);

	// [PHPS] and [/PHPS] for marking php source code
	$message = pn_bbcode_encode_phps($message, $is_html_disabled);

	// [list] and [list=x] for (un)ordered lists.
	$message = pn_bbcode_encode_list($message);

	// [b] and [/b] for bolding text.
	$message = preg_replace("/\[b\](.*?)\[\/b\]/si", "<strong>\\1</strong>", $message);

	// [i] and [/i] for italicizing text.
	$message = preg_replace("/\[i\](.*?)\[\/i\]/si", "<em>\\1</em>", $message);

	// [img]image_url_here[/img] code..
	$message = preg_replace("#\[img\](http://)?(.*?)\[/img\]#si", "<img src=\"http://\\2\" />", $message);
	//$message = preg_replace("/\[img\](.*?)\[\/img\]/si", "<IMG SRC=\"\\1\" BORDER=\"0\">", $message);

	// Patterns and replacements for URL and email tags..
	$patterns = array();
	$replacements = array();

    // move all links out of the text and replace them with placeholders
    $tagscount = preg_match_all('/<a(.*)>(.*)<\/a>/i', $message, $tags);
    for ($i = 0; $i <$tagscount; $i++) {
        $message = preg_replace('/(' . preg_quote($tags[0][$i], '/') . ')/', " PNBBCODELINKREPLACEMENT{$i} ", $message, 1);
    }

	// [url]xxxx://www.phpbb.com[/url] code..
	$patterns[0] = "#\[url\]([a-z]+?://){1}(.*?)\[/url\]#si";
	$replacements[0] = '<a href="\1\2" >\1\2</a>';

	// [url]www.phpbb.com[/url] code.. (no xxxx:// prefix).
	$patterns[1] = "#\[url\](.*?)\[/url\]#si";
	$replacements[1] = '<a href="http://\1">\1</a>';

	// [url=xxxx://www.phpbb.com]phpBB[/url] code.. 
	$patterns[2] = "#\[url=([a-z]+?://){1}(.*?)\](.*?)\[/url\]#si";
	$replacements[2] = '<a href="\1\2">\3</a>';

	// [url=www.phpbb.com]phpBB[/url] code.. (no xxxx:// prefix).
	$patterns[3] = "#\[url=(.*?)\](.*?)\[/url\]#si";
	$replacements[3] = '<a href="http://\1">\2</a>';

	// [email]user@domain.tld[/email] code..
	$patterns[4] = "#\[email\](.*?)\[/email\]#si";
	$replacements[4] = '<a href="mailto:\1">\1</a>';

	$message = preg_replace($patterns, $replacements, $message);

    // replace the links that we removed before
    for ($i = 0; $i <$tagscount; $i++) {
        $message = preg_replace("/ PNBBCODELINKREPLACEMENT{$i} /", $tags[0][$i], $message, 1);
    }

	// Remove our padding from the string..
	$message = substr($message, 1);
	return $message;

} // pn_bbcode_encode()

/**
 * Nathan Codding - Jan. 12, 2001.
 * Performs [quote][/quote] bbencoding on the given string, and returns the results.
 * Any unmatched "[quote]" or "[/quote]" token will just be left alone. 
 * This works fine with both having more than one quote in a message, and with nested quotes.
 * Since that is not a regular language, this is actually a PDA and uses a stack. Great fun.
 *
 * Note: This function assumes the first character of $message is a space, which is added by 
 * bbencode().
 */
function pn_bbcode_encode_quote($message)
{
    // move all tags out of the text and replace them with placeholders
    preg_match_all('/(<a\s+.*?\/a>|<[^>]+>)/i', $message, $matches);
    $matchnum = count($matches[1]);
    for ($i = 0; $i <$matchnum; $i++) {
        $message = preg_replace('/(' . preg_quote($matches[1][$i], '/') . ')/', " PNBBCODETAGREPLACEMENT{$i} ", $message, 1);
    }

    $quoteheader_start = pnModGetVar('pn_bbcode', 'quoteheader_start');
    $quoteheader_end   = pnModGetVar('pn_bbcode', 'quoteheader_end');
    $quotebody_start   = pnModGetVar('pn_bbcode', 'quotebody_start');
    $quotebody_end     = pnModGetVar('pn_bbcode', 'quotebody_end');

    preg_match_all("/\[quote=(.*?)\]/si", $message, $quote);
    $search = array();
    $replace = array();
    for($i=0; $i<count($quote[0]);$i++) {
        $search[] = "/" . preg_quote($quote[0][$i]) . "/si";
        $replace[] = $quoteheader_start . $quote[1][$i] . $quoteheader_end . $quotebody_start;
    }
    // replace old style opening tags
    $search[] = "/\[quote\]/si";
    $replace[] = $quoteheader_start . pnVarPrepForDisplay(_PNBBCODE_QUOTE). $quoteheader_end . $quotebody_start;
    // replace closing tags
    $search[] = "/\[\/quote\]/si";
    $replace[] = $quotebody_end;
    $message = preg_replace($search, $replace, $message);

    // replace the HTML tags that we removed before
    for ($i = 0; $i <$matchnum; $i++) {
        $message = preg_replace("/ PNBBCODETAGREPLACEMENT{$i} /", $matches[1][$i], $message, 1);
    }
    return $message;
    
} // pn_bbcode_encode_quote()


/**
 * Nathan Codding - Jan. 12, 2001.
 * Performs [code][/code] bbencoding on the given string, and returns the results.
 * Any unmatched "[code]" or "[/code]" token will just be left alone. 
 * This works fine with both having more than one code block in a message, and with nested code blocks.
 * Since that is not a regular language, this is actually a PDA and uses a stack. Great fun.
 *
 * Note: This function assumes the first character of $message is a space, which is added by 
 * bbencode().
 */
function pn_bbcode_encode_code($message, $is_html_disabled)
{
	// First things first: If there aren't any "[code]" strings in the message, we don't
	// need to process it at all.
	if (!strpos(strtolower($message), "[code]")) {
		return $message;	
	}
	
	// Second things second: we have to watch out for stuff like [1code] or [/code1] in the 
	// input.. So escape them to [#1code] or [/code#1] for now:
	$message = preg_replace("/\[([0-9]+?)code\]/si", "[#\\1code]", $message);
	$message = preg_replace("/\[\/code([0-9]+?)\]/si", "[/code#\\1]", $message);

    $codeheader_start = pnModGetVar('pn_bbcode', 'codeheader_start');
    $codeheader_end   = pnModGetVar('pn_bbcode', 'codeheader_end');
    $codebody_start   = pnModGetVar('pn_bbcode', 'codebody_start');
    $codebody_end     = pnModGetVar('pn_bbcode', 'codebody_end');
/*
    // opening tag
    $search[] = "/\[code\]/si";
    $replace[] = $codeheader_start . pnVarPrepForDisplay(_PNBBCODE_CODE). $codeheader_end . $codebody_start;
    // closing tag
    $search[] = "/\[\/code\]/si";
    $replace[] = $codebody_end;
    $message = preg_replace($search, $replace, $message);
*/
    $search = array();
    $replace = array();

    // opening tag
    $search[] = "/\[code\]/si";
    $replace[] = $codeheader_start . pnVarPrepForDisplay(_PNBBCODE_CODE). $codeheader_end . $codebody_start;
    // closing tag
    $search[] = "/\[\/code\]/si";
    $replace[] = $codebody_end;

    $count = preg_match_all("#(\[code\])(.*?)(\[\/code\])#si", $message, $bbcode);
    for($i=0; $i < $count; $i++) {
        // the code in between
        $search[] = "/" . preg_quote($bbcode[2][0], "/") . "/";
        $code_after  = pn_bbcode_br2nl($bbcode[2][0]);
        $code_after  = preg_replace("/</", "&lt;", $code_after);
        $code_after  = preg_replace("/>/", "&gt;", $code_after);
        $replace[] = $code_after;
    }
    $message = preg_replace($search, $replace, $message);

	
	// Undo our escaping from "second things second" above..
	$message = preg_replace("/\[#([0-9]+?)code\]/si", "[\\1code]", $message);
	$message = preg_replace("/\[\/code#([0-9]+?)\]/si", "[/code\\1]", $message);
	return $message;
	
} // pn_bbcode_encode_code()


/**
 * Nathan Codding - Jan. 12, 2001.
 * Performs [list][/list] and [list=?][/list] bbencoding on the given string, and returns the results.
 * Any unmatched "[list]" or "[/list]" token will just be left alone. 
 * This works fine with both having more than one list in a message, and with nested lists.
 * Since that is not a regular language, this is actually a PDA and uses a stack. Great fun.
 *
 * Note: This function assumes the first character of $message is a space, which is added by 
 * bbencode().
 */
function pn_bbcode_encode_list($message)
{		
	$start_length = array();
	$start_length['ordered'] = 8;
	$start_length['unordered'] = 6;

	// First things first: If there aren't any "[list" strings in the message, we don't
	// need to process it at all.
	if (!strpos(strtolower($message), "[list")) {
		return $message;	
	}

	$stack = array();
	$curr_pos = 1;
	while ($curr_pos && ($curr_pos < strlen($message)))	{	
		$curr_pos = strpos($message, "[", $curr_pos);

		// If not found, $curr_pos will be 0, and the loop will end.
		if ($curr_pos) {
			// We found a [. It starts at $curr_pos.
			// check if it's a starting or ending list tag.
			$possible_ordered_start = substr($message, $curr_pos, $start_length['ordered']);
			$possible_unordered_start = substr($message, $curr_pos, $start_length['unordered']);
			$possible_end = substr($message, $curr_pos, 7);
			if (strcasecmp("[list]", $possible_unordered_start) == 0) {
				// We have a starting unordered list tag.
				// Push its position on to the stack, and then keep going to the right.
				array_push($stack, array($curr_pos, ""));
				++$curr_pos;
			} else if (preg_match("/\[list=([a1])\]/si", $possible_ordered_start, $matches)) {
				// We have a starting ordered list tag.
				// Push its position on to the stack, and the starting char onto the start
				// char stack, the keep going to the right.
				array_push($stack, array($curr_pos, $matches[1]));
				++$curr_pos;
			} else if (strcasecmp("[/list]", $possible_end) == 0) {
				// We have an ending list tag.
				// Check if we've already found a matching starting tag.
				if (sizeof($stack) > 0) {
					// There exists a starting tag. 
					// We need to do 2 replacements now.
					$start = array_pop($stack);
					$start_index = $start[0];
					$start_char = $start[1];
					$is_ordered = ($start_char != "");
					$start_tag_length = ($is_ordered) ? $start_length['ordered'] : $start_length['unordered'];

					// everything before the [list] tag.
					$before_start_tag = substr($message, 0, $start_index);

					// everything after the [list] tag, but before the [/list] tag.
					$between_tags = substr($message, $start_index + $start_tag_length, $curr_pos - $start_index - $start_tag_length);
					// Need to replace [*] with <li> inside the list.
					$between_tags = str_replace("[*]", "<li>", $between_tags);
					
					// everything after the [/list] tag.
					$after_end_tag = substr($message, $curr_pos + 7);

					if ($is_ordered) {
						$message = $before_start_tag . '<ol type=' . $start_char . '>';
						$message .= $between_tags . '</ol>';
					} else {
						$message = $before_start_tag . '<ul>';
						$message .= $between_tags . "</ul>";
					}

					$message .= $after_end_tag;
					
					// Now.. we've screwed up the indices by changing the length of the string. 
					// So, if there's anything in the stack, we want to resume searching just after it.
					// otherwise, we go back to the start.
					if (sizeof($stack) > 0) {
						$a = array_pop($stack);
						$curr_pos = $a[0];
						array_push($stack, $a);
						++$curr_pos;
					} else {
						$curr_pos = 1;
					}
				} else {
					// No matching start tag found. Increment pos, keep going.
					++$curr_pos;	
				}
			} else {
				// No starting tag or ending tag.. Increment pos, keep looping.,
				++$curr_pos;	
			}
		}
	} // while

	return $message;

} // pn_bbcode_encode_list()

/**
 * Nathan Codding - Oct. 30, 2000
 *
 * Escapes the "/" character with "\/". This is useful when you need
 * to stick a runtime string into a PREG regexp that is being delimited 
 * with slashes.
 */
function pn_escape_slashes($input)
{
	$output = str_replace('/', '\/', $input);
	return $output;
}

/**
 * larsneo - Jan. 11, 2003
 *
 * removes instances of <br /> since sometimes they are stored in DB :(
 */
function pn_bbcode_br2nl($str) 
{
    return preg_replace("=<br(>|([\s/][^>]*)>)\r?\n?=i", "\n", $str);
}

/**
 * encode php source code
 *
 * Credits for this function go to BraveCobra (webmaster@bravecobra.com)
 *
 */
function pn_bbcode_encode_phps($message, $is_html_disabled)
{
	// First things first: If there aren't any "[phps]" strings in the message, we don't
	// need to process it at all.
	if (!strpos(strtolower($message), "[phps]"))
	{
		return $message;
	}

	// Second things second: we have to watch out for stuff like [1code] or [/code1] in the
	// input.. So escape them to [#1code] or [/code#1] for now:
	$message = preg_replace("/\[([0-9]+?)phps\]/si", "[#\\1phps]", $message);
	$message = preg_replace("/\[\/phps([0-9]+?)\]/si", "[/phps#\\1]", $message);
/*
    $codeheader_start = pnModGetVar('pn_bbcode', 'codeheader_start');
    $codeheader_end   = pnModGetVar('pn_bbcode', 'codeheader_end');
    $codebody_start   = pnModGetVar('pn_bbcode', 'codebody_start');
    $codebody_end     = pnModGetVar('pn_bbcode', 'codebody_end');

	$stack = Array();
	$curr_pos = 1;
	$max_nesting_depth = 0;
	while ($curr_pos && ($curr_pos < strlen($message)))
	{
		$curr_pos = strpos($message, "[", $curr_pos);

		// If not found, $curr_pos will be 0, and the loop will end.
		if ($curr_pos)
		{
			// We found a [. It starts at $curr_pos.
			// check if it's a starting or ending code tag.
			$possible_start = substr($message, $curr_pos, 6);
			$possible_end = substr($message, $curr_pos, 7);
			if (strcasecmp("[phps]", $possible_start) == 0)
			{
				// We have a starting code tag.
				// Push its position on to the stack, and then keep going to the right.
				array_push($stack, $curr_pos);
				++$curr_pos;
			}
			else if (strcasecmp("[/phps]", $possible_end) == 0)
			{
				// We have an ending code tag.
				// Check if we've already found a matching starting tag.
				if (sizeof($stack) > 0)
				{
					// There exists a starting tag.
					$curr_nesting_depth = sizeof($stack);
					$max_nesting_depth = ($curr_nesting_depth > $max_nesting_depth) ? $curr_nesting_depth : $max_nesting_depth;

					// We need to do 2 replacements now.
					$start_index = array_pop($stack);

					// everything before the [code] tag.
					$before_start_tag = substr($message, 0, $start_index);

					// everything after the [code] tag, but before the [/code] tag.
					$between_tags = substr($message, $start_index + 6, $curr_pos - $start_index - 6);

					// everything after the [/code] tag.
					$after_end_tag = substr($message, $curr_pos + 7);

					$message = $before_start_tag . "[" . $curr_nesting_depth . "phps]";
					$message .= $between_tags . "[/phps" . $curr_nesting_depth . "]";
					$message .= $after_end_tag;

					// Now.. we've screwed up the indices by changing the length of the string.
					// So, if there's anything in the stack, we want to resume searching just after it.
					// otherwise, we go back to the start.
					if (sizeof($stack) > 0)
					{
						$curr_pos = array_pop($stack);
						array_push($stack, $curr_pos);
						++$curr_pos;
					}
					else
					{
						$curr_pos = 1;
					}
				}
				else
				{
					// No matching start tag found. Increment pos, keep going.
					++$curr_pos;
				}
			}
			else
			{
				// No starting tag or ending tag.. Increment pos, keep looping.,
				++$curr_pos;
			}
		}
	} // while

	if ($max_nesting_depth > 0)
	{
		for ($i = 1; $i <= $max_nesting_depth; ++$i)
		{
			$start_tag = pn_escape_slashes(preg_quote("[" . $i . "phps]"));
			$end_tag = pn_escape_slashes(preg_quote("[/phps" . $i . "]"));

			$match_count = preg_match_all("/$start_tag(.*?)$end_tag/si", $message, $matches);

			for ($j = 0; $j < $match_count; $j++)
			{
echo "start:$start_tag:<br>";
echo "end:$end_tag:<br>";
echo "0:0:".pnVarPrepHTMLDisplay($matches[0][0]).":<br>";
echo "1:0:".pnVarPrepHTMLDisplay($matches[1][0]).":<br>";
				$before_replace = pn_escape_slashes(preg_quote($matches[1][$j]));
				$after_replace = $matches[1][$j];

				if (($i < 2) && !$is_html_disabled)
				{
					// don't escape special chars when we're nested, 'cause it was already done
					// at the lower level..
					// also, don't escape them if HTML is disabled in this post. it'll already be done
					// by the posting routines.
					//$after_replace = htmlspecialchars($after_replace);
				}

				$str_to_match = $start_tag . $before_replace . $end_tag;

				//$message = preg_replace("/$str_to_match/si", "<TABLE BORDER=0 ALIGN=CENTER WIDTH=85%><TR><TD>"._BCPHPHIGHLIGHT_CODE.":<HR></TD></TR><TR><TD><PRE>".bcPhpHighlight_br2nl($after_replace)."</PRE></TD></TR><TR><TD><HR></TD></TR></TABLE>", $message);
                $after_replace = ereg_replace("&lt;","<",$after_replace);
                $after_replace = ereg_replace("&gt;",">",$after_replace);
                $after_replace = ereg_replace("&amp;","&",$after_replace);
echo "after_replace:".pnVarPrepHTMLDisplay($after_replace).":<br>";
                $message = preg_replace("/$str_to_match/si", $codeheader_start . pnVarPrepForDisplay(_PNBBCODE_CODE) . $codeheader_end . $codebody_start . pn_bbcode_br2nl(highlight_string($after_replace,true)) . $codebody_end, $message);
                //$message = highlight_string($message,true);
			}
		}
	}
*/
    $codeheader_start = pnModGetVar('pn_bbcode', 'codeheader_start');
    $codeheader_end   = pnModGetVar('pn_bbcode', 'codeheader_end');
    $codebody_start   = pnModGetVar('pn_bbcode', 'codebody_start');
    $codebody_end     = pnModGetVar('pn_bbcode', 'codebody_end');

    $search = array();
    $replace = array();

    $match_count = preg_match_all("/(\[phps\])(.*?)(\[\/phps\])/si", $message, $matches);
    for($cnt=0; $cnt<$match_count; $cnt++) {
        $replacestr = $matches[2][0];  
        $replacestr = ereg_replace("&lt;","<", $replacestr);
        $replacestr = ereg_replace("&gt;",">", $replacestr);
        $replacestr = ereg_replace("&amp;","&",$replacestr);
        $replacestr = preg_replace("=<br(>|([\s/][^>]*)>)\r?\n?=i", "\n", $replacestr);
        $search[] = "/" . preg_quote($matches[2][0]) . "/";
        $replace[] = highlight_string($replacestr, true);
    }

    // opening tag
    $search[] = "/\[phps\]/si";
    $replace[] = $codeheader_start . pnVarPrepForDisplay(_PNBBCODE_CODE). $codeheader_end . $codebody_start;
    // closing tag
    $search[] = "/\[\/phps\]/si";
    $replace[] = $codebody_end;
    $message = preg_replace($search, $replace, $message);
    $message = ereg_replace("<code>","", $message);
    $message = ereg_replace("</code>","",$message);
    $message = ereg_replace("\n\n","\n",$message);

	// Undo our escaping from "second things second" above..
	$message = preg_replace("/\[#([0-9]+?)phps\]/si", "[\\1phps]", $message);
	$message = preg_replace("/\[\/phps#([0-9]+?)\]/si", "[/phps\\1]", $message);
	return $message;

} // bcPhpHighlight_encode_phps()

?>