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
// do NOT change the following lines. Although they are not language
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

// new for mimetex-integration
define('_BBCODE_ADMINMIMETEXCONFIG',	'Konfiguration mimeTeX-Schnittstelle [math][/math]');
define('_BBCODE_MIMETEX_ENABLE',		'Schnittstelle f�r mimeTeX aktivieren');
define('_BBCODE_MIMETEX_FULL_URL',		'URL zur mimeTeX CGI-Schnittstelle');
define('_BBCODE_MIMETEX_URL_DESC',		'Bitte eine eigene Installation von mimeTeX anlegen und nicht fremde Serverlast benutzen!');
define('_BBCODE_MIMETEX_TESTIMAGE',		'Testbild f�r mimeTeX:');
define('_BBCODE_MIMETEX_ENTERURLFORTESTIMAGE',	'Wenn sie eine Adresse zur mimeTeX-Installation angegeben haben, wird hier ein Testbild angezeigt, welches anzeigt, dass mimeTeX hoffentlich richtig funktioniert.');

// new in 2.0
define('_BBCODE_GOTOHOMEPAGE', 'gehe zur bbcode-Projektseite');
define('_BBCODE_ADMIN_START', 'Start');
define('_BBCODE_ISHOOKEDWITH', 'bbcode wird mit folgenden Modulen verwendet');
define('_BBCODE_NOTHOOKED', '** bbcode wird zur Zeit von keinem Modul verwendet **');
define('_BBCODE_ADDHOOK', 'bbcode f�r weitere Module aktivieren');
define('_BBCODE_ILLEGALVALUE', 'ung�ltiger Wert, erlaubtes Format: bis zu vier Vorkomma- und 2 Nachkommastellen plus Einheit: cm,em,ex,in,mm,pc,pt,px oder %. Beispiel: 1.05em oder 95%');
define('_BBCODE_CODE_ENABLE', 'Codehervorhebung einschalten');
define('_BBCODE_QUOTE_ENABLE', 'Zitathervorhebung einschalten');
define('_BBCODE_ADMINMISCCONFIG', 'sonstige Konfiguration');
define('_BBCODE_IMGTAGCONFIG', 'Konfiguration des IMG-Tags');
define('_BBCODE_LIGHTBOX_ENABLE', 'Lightbox in img-Tag einschalten'); 
define('_BBCODE_LIGHTBOX_PREVIEWWIDTH', 'Breite des Vorschaubildes');
define('_BBCODE_LIGHTBOX_PREVIEWWIDTHINFO', '(50-1000px)');
define('_BBCODE_LIGHTBOX_PREVIEWHEIGHTINFO', 'Die H�he wird automatisch vom Browser angepasst.');
define('_BBCODE_ADMINCONFIG', 'Konfiguration');
define('_BBCODE_LINK_SHRINKSIZE', 'Links verk�rzen auf');
define('_BBCODE_LINK_SHRINKSIZEINFO', 'Verk�rzt die angezeigten Links im URL-Tag auf die angegebene Anzahl Zeichen, 0=keine K�rzung');
define('_BBCODE_CHARS', 'Zeichen');
define('_BBCODE_SPOILER_ENABLE', 'Spoilertag einschalten');
define('_BBCODE_SPOILERCODE', 'HTML f�r Spoilertag');
define('_BBCODE_SPOILERHINT', '%h = �berschrift (_BBCODE_SPOILERWARNING), %s = Text.');
define('_BBCODE_SPOILERWARNING', 'Achtung, Spoiler:');
define('_BBCODE_SPOILER', 'Spoiler');
define('_BBCODE_SPOILER_HINT', 'Text verstecken');

define('_BBCODE_HELPURL', 'http://de.wikipedia.org/wiki/BBCode');
define('_BBCODE_HELPURL_HINT', 'what is BBCode?');
define('_BBCODE_ADMINCODECONFIG', 'Konfiguration [code][/code]');
define('_BBCODE_ADMINCOLORCONFIG', 'Konfiguration [color][/color]');
define('_BBCODE_ADMINISTRATION', 'bbcode Verwaltung');
define('_BBCODE_ADMINQUOTECONFIG', 'Konfiguration [quote][/quote]');
define('_BBCODE_ADMINSIZECONFIG', 'Konfiguration [size][/size]');
define('_BBCODE_BOLD', 'b');
define('_BBCODE_BOLD_HINT', 'Fettschrift');
define('_BBCODE_CODE', 'Code');
define('_BBCODE_CODEHINT', '%h = �berschrift (_BBCODE_CODE), %c = Codezeilen, %j = Codezeilen, vorbereitet f�r Javascript');
define('_BBCODE_CODE_HINT', 'Codezeilen einf�gen');
define('_BBCODE_CODE_SYNTAXHIGHLIGHTING', 'Codehervorhebung ausw�hlen');
define('_BBCODE_CODE_NOSYNTAXHIGHLIGHTING', 'keine Codehervorhebung');
define('_BBCODE_CODE_GESHIWITHLINENUMBERS', 'GeSHi mit Zeilennummern');
define('_BBCODE_CODE_GESHIWITHOUTLINENUMBERS', 'GeSHi ohne Zeilennummern');
define('_BBCODE_CODE_GOOGLEPRETTIFIER', 'Google Code Prettifier');
define('_BBCODE_COLOR_ALLOWUSERCOLOR', 'Erlaube userdefinierte Textfarben');
define('_BBCODE_COLOR_BLACK', 'Schwarz');
define('_BBCODE_COLOR_BLUE', 'Blau');
define('_BBCODE_COLOR_BROWN', 'Braun');
define('_BBCODE_COLOR_CYAN', 'T�rkis');
define('_BBCODE_COLOR_DARKBLUE', 'Dunkelblau');
define('_BBCODE_COLOR_DARKRED', 'Dunkelrot');
define('_BBCODE_COLOR_DEFAULT', 'Standard');
define('_BBCODE_COLOR_DEFINE', 'Selbst definieren');
define('_BBCODE_COLOR_ENABLE', 'Flexible Textfarben einschalten');
define('_BBCODE_COLOR_GREEN', 'Gr�n');
define('_BBCODE_COLOR_HINT', 'Schriftfarbe w�hlen');
define('_BBCODE_COLOR_INDIGO', 'Indigo');
define('_BBCODE_COLOR_OLIVE', 'Oliv');
define('_BBCODE_COLOR_ORANGE', 'Orange');
define('_BBCODE_COLOR_RED', 'Rot');
define('_BBCODE_COLOR_TEXTCOLORCODE', 'Farbcode angeben');
define('_BBCODE_COLOR_VIOLET', 'Violett');
define('_BBCODE_COLOR_WHITE', 'Weiss');
define('_BBCODE_COLOR_YELLOW', 'Gelb');
define('_BBCODE_CONFIGCHANGED', 'Konfiguration ge�ndert');
define('_BBCODE_ENTER_EMAIL_ADDRESS','gew�nschte E-Mail-Adresse angeben');
define('_BBCODE_ENTER_LIST_ITEM','Listen-Eintrag angeben. Bitte beachten, dass Listen ge�ffnet und geschlossen werden m�ssen');
define('_BBCODE_ENTER_PAGE_TITLE','Seitentitel');
define('_BBCODE_ENTER_SITE_TITLE','Titel der Seite angeben');
define('_BBCODE_ENTER_TEXT_BOLD','den fetten Text angeben');
define('_BBCODE_ENTER_TEXT_ITALIC','den kursiven Text angeben');
define('_BBCODE_ENTER_TEXT_UNDERLINE','den unterstrichenenen Text angeben');
define('_BBCODE_ENTER_URL','URL der gew�nschten Seite angeben');
define('_BBCODE_ENTER_WEBIMAGE_URL','URL f�r das anzuzeigende Bild angeben');
define('_BBCODE_FONTCOLOR', 'Schriftfarbe');
define('_BBCODE_FONTSIZE', 'Schriftgr�sse');
define('_BBCODE_IMAGE', 'Grafik');
define('_BBCODE_IMAGE_HINT', 'Eine Grafik einf�gen');
define('_BBCODE_ITALIC', 'i');
define('_BBCODE_ITALIC_HINT', 'Kursivschrift');
define('_BBCODE_LIST_HINT', 'Liste einf�gen');
define('_BBCODE_LISTCLOSE', '/ul');
define('_BBCODE_LISTCLOSE_HINT', 'Liste schliessen');
define('_BBCODE_LISTITEM', 'li');
define('_BBCODE_LISTITEM_HINT', 'Listeneintrag');
define('_BBCODE_LISTOPEN', 'ul');
define('_BBCODE_LISTOPEN_HINT', 'Liste �ffnen');
define('_BBCODE_MAIL', 'Email');
define('_BBCODE_MAIL_HINT', 'Eine Mailadresse einf�gen');
define('_BBCODE_NO', 'Nein');
define('_BBCODE_NOAUTH', 'Keine Berechtigung f�r diese Aktion');
define('_BBCODE_NOSCRIPTWARNING', 'Der Browser unterst�tzt kein Javascript oder Javascript ist deaktiviert. Das bbcode-Bedienfeld ist deshalb nicht verf�gbar.');
define('_BBCODE_NOSPECIALCODE', 'kein spezieller Code');
define('_BBCODE_NOTALLOWEDTOSEEEMAILS', '*Keine Berechtigung f�r Emails*');
define('_BBCODE_NOTALLOWEDTOSEEEXTERNALLINKS', '*Keine Berechtigung f�r Links*');
define('_BBCODE_ORIGINALSENDER', 'Absender');
define('_BBCODE_PNADMINISTRATION', 'Administration');
define('_BBCODE_PREVIEW','Vorschau');
define('_BBCODE_QUOTE', 'Zitat');
define('_BBCODE_QUOTEHINT', '%u = Username, %t = zitierter Text');
define('_BBCODE_QUOTE_HINT', 'Zitat einf�gen');
define('_BBCODE_SELECTCODE', 'Codetyp ausw�hlen');
define('_BBCODE_SIZE_ALLOWUSERSIZE', 'Erlaube userdefinierte Textgr��e');
define('_BBCODE_SIZE_DEFINE', 'Selbst definieren');
define('_BBCODE_SIZE_ENABLE', 'Flexible Textgr��en einschalten');
define('_BBCODE_SIZE_HINT', 'Schriftgr�sse w�hlen');
define('_BBCODE_SIZE_HUGE', 'Sehr gross');
define('_BBCODE_SIZE_LARGE', 'Gross');
define('_BBCODE_SIZE_NORMAL', 'Normal');
define('_BBCODE_SIZE_SMALL', 'Klein');
define('_BBCODE_SIZE_TEXTSIZE', 'Textgr�sse angeben');
define('_BBCODE_SIZE_TINY', 'Winzig');
define('_BBCODE_UNDERLINE', 'u');
define('_BBCODE_UNDERLINE_HINT', 'unterstrichene Schrift');
define('_BBCODE_URL', 'URL');
define('_BBCODE_URL_HINT', 'Einen Link einf�gen');
define('_BBCODE_YES', 'Ja');
