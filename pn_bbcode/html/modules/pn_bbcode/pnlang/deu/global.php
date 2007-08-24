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

// begin of no-change-area
// do NOT change the following lines. Although theysa are not language
// relevant they are important for this module
// 0 = no highlighting
define('HILITE_NONE', 0);
// 1 = geshi with linenumbers
define('HILITE_GESHI_WITH_LN', 1);
// 2 = geshi without linenumbers
define('HILITE_GESHI_WITHOUT_LN', 2);
// 3 = google code prettifier
define('HILITE_GOOGLE', 3);
// end of no-change-area

// new in 2.0
define('_PNBBCODE_GOTOHOMEPAGE', 'gehe zur pn_bbcode-Projektseite im NOC');
define('_PNBBCODE_ADMIN_START', 'Start');
define('_PNBBCODE_ISHOOKEDWITH', 'pn_bbcode wird mit folgenden Modulen verwendet');
define('_PNBBCODE_NOTHOOKED', '** pn_bbcode wird zur Zeit von keinem Modul verwendet **');
define('_PNBBCODE_ADDHOOK', 'pn_bbcode f�r weitere Module aktivieren');
define('_PNBBCODE_ILLEGALVALUE', 'ung�ltiger Wert, erlaubtes Format: bis zu vier Vorkomma- und 2 Nachkommastellen plus Einheit: cm,em,ex,in,mm,pc,pt,px oder %. Beispiel: 1.05em oder 95%');
define('_PNBBCODE_CODE_ENABLE', 'code-Tag erlauben');
define('_PNBBCODE_QUOTE_ENABLE', 'quote-Tag erlauben');

define('_PNBBCODE_HELPURL', 'http://de.wikipedia.org/wiki/BBCode');
define('_PNBBCODE_HELPURL_HINT', 'what is BBCode?');
define('_PNBBCODE_ADMINCODECONFIG', 'Konfiguration [code][/code]');
define('_PNBBCODE_ADMINCOLORCONFIG', 'Konfiguration [color][/color]');
define('_PNBBCODE_ADMINISTRATION', 'pn_bbcode Verwaltung');
define('_PNBBCODE_ADMINQUOTECONFIG', 'Konfiguration [quote][/quote]');
define('_PNBBCODE_ADMINSIZECONFIG', 'Konfiguration [size][/size]');
define('_PNBBCODE_ARGSERROR',                 '[pn_bbcode] Interner Fehler! Argumente nicht verf�gbar!');
define('_PNBBCODE_BOLD', 'b');
define('_PNBBCODE_BOLD_HINT', 'Fettschrift');
define('_PNBBCODE_CODE', 'Code');
define('_PNBBCODE_CODEHINT', '%h = �berschrift (_PNBBCODE_CODE), %c = Codezeilen, %j = Codezeilen, vorbereitet f�r Javascript');
define('_PNBBCODE_CODE_HINT', 'Codezeilen einf�gen');
define('_PNBBCODE_CODE_SYNTAXHIGHLIGHTING', 'Codehervorhebung ausw�hlen');
define('_PNBBCODE_CODE_NOSYNTAXHIGHLIGHTING', 'keine Codehervorhebung');
define('_PNBBCODE_CODE_GESHIWITHLINENUMBERS', 'GeSHi mit Zeilennummern');
define('_PNBBCODE_CODE_GESHIWITHOUTLINENUMBERS', 'GeSHi ohne Zeilennummern');
define('_PNBBCODE_CODE_GOOGLEPRETTIFIER', 'Google Code Prettifier');
define('_PNBBCODE_COLOR_ALLOWUSERCOLOR', 'Erlaube userdefinierte Textfarben');
define('_PNBBCODE_COLOR_BLACK', 'Schwarz');
define('_PNBBCODE_COLOR_BLUE', 'Blau');
define('_PNBBCODE_COLOR_BROWN', 'Braun');
define('_PNBBCODE_COLOR_CYAN', 'T�rkis');
define('_PNBBCODE_COLOR_DARKBLUE', 'Dunkelblau');
define('_PNBBCODE_COLOR_DARKRED', 'Dunkelrot');
define('_PNBBCODE_COLOR_DEFAULT', 'Standard');
define('_PNBBCODE_COLOR_DEFINE', 'Selbst definieren');
define('_PNBBCODE_COLOR_ENABLE', 'Flexible Textfarben einschalten');
define('_PNBBCODE_COLOR_GREEN', 'Gr�n');
define('_PNBBCODE_COLOR_HINT', 'Schriftfarbe w�hlen');
define('_PNBBCODE_COLOR_INDIGO', 'Indigo');
define('_PNBBCODE_COLOR_OLIVE', 'Oliv');
define('_PNBBCODE_COLOR_ORANGE', 'Orange');
define('_PNBBCODE_COLOR_RED', 'Rot');
define('_PNBBCODE_COLOR_TEXTCOLORCODE', 'Farbcode angeben');
define('_PNBBCODE_COLOR_VIOLET', 'Violett');
define('_PNBBCODE_COLOR_WHITE', 'Weiss');
define('_PNBBCODE_COLOR_YELLOW', 'Gelb');
define('_PNBBCODE_CONFIGCHANGED', 'Konfiguration ge�ndert');
define('_PNBBCODE_ENTER_EMAIL_ADDRESS','gew�nschte E-Mail-Adresse angeben');
define('_PNBBCODE_ENTER_LIST_ITEM','Listen-Eintrag angeben. Bitte beachten, dass Listen ge�ffnet und geschlossen werden m�ssen');
define('_PNBBCODE_ENTER_PAGE_TITLE','Seitentitel');
define('_PNBBCODE_ENTER_SITE_TITLE','Titel der Seite angeben');
define('_PNBBCODE_ENTER_TEXT_BOLD','den fetten Text angeben');
define('_PNBBCODE_ENTER_TEXT_ITALIC','den kursiven Text angeben');
define('_PNBBCODE_ENTER_TEXT_UNDERLINE','den unterstrichenenen Text angeben');
define('_PNBBCODE_ENTER_URL','URL der gew�nschten Seite angeben');
define('_PNBBCODE_ENTER_WEBIMAGE_URL','URL f�r das anzuzeigende Bild angeben');
define('_PNBBCODE_FONTCOLOR', 'Schriftfarbe');
define('_PNBBCODE_FONTSIZE', 'Schriftgr�sse');
define('_PNBBCODE_IMAGE', 'Grafik');
define('_PNBBCODE_IMAGE_HINT', 'Eine Grafik einf�gen');
define('_PNBBCODE_ITALIC', 'i');
define('_PNBBCODE_ITALIC_HINT', 'Kursivschrift');
define('_PNBBCODE_LIST_HINT', 'Liste einf�gen');
define('_PNBBCODE_LISTCLOSE', '/ul');
define('_PNBBCODE_LISTCLOSE_HINT', 'Liste schliessen');
define('_PNBBCODE_LISTITEM', 'li');
define('_PNBBCODE_LISTITEM_HINT', 'Listeneintrag');
define('_PNBBCODE_LISTOPEN', 'ul');
define('_PNBBCODE_LISTOPEN_HINT', 'Liste �ffnen');
define('_PNBBCODE_MAIL', 'Email');
define('_PNBBCODE_MAIL_HINT', 'Eine Mailadresse einf�gen');
define('_PNBBCODE_NO', 'Nein');
define('_PNBBCODE_NOAUTH', 'Keine Berechtigung f�r diese Aktion');
define('_PNBBCODE_NOSCRIPTWARNING', 'Der Browser unterst�tzt kein Javascript oder Javascript ist deaktiviert. Das pn_bbcode-Bedienfeld it deshalb nicht verf�gbar.');
define('_PNBBCODE_NOSPECIALCODE', 'kein spezieller Code');
define('_PNBBCODE_NOTALLOWEDTOSEEEMAILS', '*Keine Berechtigung f�r Emails*');
define('_PNBBCODE_NOTALLOWEDTOSEEEXTERNALLINKS', '*Keine Berechtigung f�r Links*');
define('_PNBBCODE_ORIGINALSENDER', 'Absender');
define('_PNBBCODE_PNADMINISTRATION', 'Administration');
define('_PNBBCODE_PREVIEW','Vorschau');
define('_PNBBCODE_QUOTE', 'Zitat');
define('_PNBBCODE_QUOTEHINT', '%u = Username, %t = zitierter Text');
define('_PNBBCODE_QUOTE_HINT', 'Zitat einf�gen');
define('_PNBBCODE_SELECTCODE', 'Codetyp ausw�hlen');
define('_PNBBCODE_SIZE_ALLOWUSERSIZE', 'Erlaube userdefinierte Textgr��e');
define('_PNBBCODE_SIZE_DEFINE', 'Selbst definieren');
define('_PNBBCODE_SIZE_ENABLE', 'Flexible Textgr��en einschalten');
define('_PNBBCODE_SIZE_HINT', 'Schriftgr�sse w�hlen');
define('_PNBBCODE_SIZE_HUGE', 'Sehr gross');
define('_PNBBCODE_SIZE_LARGE', 'Gross');
define('_PNBBCODE_SIZE_NORMAL', 'Normal');
define('_PNBBCODE_SIZE_SMALL', 'Klein');
define('_PNBBCODE_SIZE_TEXTSIZE', 'Textgr�sse angeben');
define('_PNBBCODE_SIZE_TINY', 'Winzig');
define('_PNBBCODE_UNDERLINE', 'u');
define('_PNBBCODE_UNDERLINE_HINT', 'unterstrichene Schrift');
define('_PNBBCODE_URL', 'URL');
define('_PNBBCODE_URL_HINT', 'Einen Link einf�gen');
define('_PNBBCODE_YES', 'Ja');
