<?php
// $Id$
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

/**
 * @package PostNuke_Utility_Modules
 * @subpackage pn_bbcode
 * @license http://www.gnu.org/copyleft/gpl.html
*/

/**
 * main funcion
 * The main function is not used in the pn_bbcode module, we just redirect to index.php
 *
 */
function pn_bbcode_user_main()
{
    return pnRedirect('index.php');
}

/**
 * whatisbbcode
 * The only relevant funtion here displays some help for bbcode tags
 * no parameters needed
 *
 */
function pn_bbcode_user_whatisbbcode()
{
    $pnr = new pnRender('pn_bbcode');
    return $pnr->fetch('pn_bbcode_user_whatisbbcode.html');
}

/**
 * bbcode
 * returns a html snippet with buttons for inserting bbocdes into a text
 *
 *@params $args['images'] use image buttons if set
 *@params $args['textfieldid'] id of the textfield for inserting smilies
 */
function pn_bbcode_user_bbcodes($args)
{
    $images      = $args['images'];
    $textfieldid = $args['textfieldid'];

    if(empty($textfieldid)) {
        return _MODARGSERROR . ' (missing mandatory parameter textfieldid)';
    }

    // if we have more than one textarea we need to distinguish them, so we simply use
    // a counter stored in a session var until we find a better solution
    $counter = (int)pnSessionGetVar('bbcode_counter');
    $counter++;
    pnSessionSetVar('bbcode_counter', $counter);

    $pnr = new pnRender('pn_bbcode');
    $pnr->caching = false;
    $pnr->add_core_data();
    $pnr->assign('counter', $counter);
    $pnr->assign('images', $images);

    // find the correct javascript file depending on the users language
    $userlang = pnVarPrepForOS(pnUserGetLang());
    $file_1 = "modules/pn_bbcode/pnjavascript/$userlang/bbcode.js";
    $file_2 = "modules/pn_bbcode/pnjavascript/eng/bbcode.js";
    if(file_exists($file_1) && is_readable($file_1)) {
        pn_bbcode_add_javascript_header($file_1);
    } elseif(file_exists($file_2) && is_readable($file_2)) {
        pn_bbcode_add_javascript_header($file_2);
    }

    pn_bbcode_add_javascript_header('modules/pn_bbcode/pnjavascript/bbcode_common.js');
    pn_bbcode_add_javascript_header('javascript/ajax/prototype.js');
    pn_bbcode_add_javascript_header('modules/pn_bbcode/pnjavascript/prettify.js');
    pn_bbcode_add_stylesheet_header();

    // get the languages for highlighting
    $langs = pnModAPIFunc('pn_bbcode', 'user', 'get_geshi_languages');
    $pnr->assign('geshi_languages', $langs);
    $pnr->assign('textfieldid', $textfieldid);

    return $pnr->fetch('pn_bbcode_user_bbcodes.html');
}

?>