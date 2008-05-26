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

define('_PNBBCODE_HELPURL', 'http://fr.wikipedia.org/wiki/BBCode');
define('_PNBBCODE_HELPURL_HINT', 'what is BBCode?');
define('_PNBBCODE_ADMINCODECONFIG', 'Configuration de [code][/code]');
define('_PNBBCODE_ADMINCOLORCONFIG', 'Configuration de [color][/color]');
define('_PNBBCODE_ADMINISTRATION', 'Administration de pn_bbcode');
define('_PNBBCODE_ADMINQUOTECONFIG', 'Configuration de [quote][/quote]');
define('_PNBBCODE_ADMINSIZECONFIG', 'Configuration de [size][/size]');
define('_PNBBCODE_ARGSERROR', '[pn_bbcode] Erreur interne ! Argument manquant !');
define('_PNBBCODE_BOLD', 'b');
define('_PNBBCODE_BOLD_HINT', 'texte gras');
define('_PNBBCODE_CODE', 'Code');
define('_PNBBCODE_CODE_HINT', 'ins�rer du code');
define('_PNBBCODE_COLOR_BLACK', 'Noir');
define('_PNBBCODE_COLOR_BLUE', 'Bleu');
define('_PNBBCODE_COLOR_BROWN', 'Marron');
define('_PNBBCODE_COLOR_CYAN', 'Cyan');
define('_PNBBCODE_COLOR_DARKBLUE', 'Bleu fonc�');
define('_PNBBCODE_COLOR_DARKRED', 'Rouge fonc�');
define('_PNBBCODE_COLOR_DEFAULT', 'Standard');
define('_PNBBCODE_COLOR_DEFINE', 'couleur personnalis�e');
define('_PNBBCODE_COLOR_GREEN', 'Vert');
define('_PNBBCODE_COLOR_HINT', 's�lectionner la couleur du texte');
define('_PNBBCODE_COLOR_INDIGO', 'Indigo');
define('_PNBBCODE_COLOR_OLIVE', 'Olive');
define('_PNBBCODE_COLOR_ORANGE', 'Orange');
define('_PNBBCODE_COLOR_RED', 'Rouge');
define('_PNBBCODE_COLOR_TEXTCOLORCODE', 'entrez le code de la couleur');
define('_PNBBCODE_COLOR_VIOLET', 'Violet');
define('_PNBBCODE_COLOR_WHITE', 'Blanc');
define('_PNBBCODE_COLOR_YELLOW', 'Jaune');
define('_PNBBCODE_ENTER_EMAIL_ADDRESS','Entrez l\'adresse email que vous d�sirez ajouter :');
define('_PNBBCODE_ENTER_LIST_ITEM','Entrez la nouvelle liste des items. Notez que chaque liste doit commencer par une ouverture de liste et se terminer par une fermeture de liste :');
define('_PNBBCODE_ENTER_PAGE_TITLE','Titre de la page :');
define('_PNBBCODE_ENTER_SITE_TITLE','Entrez le titre du site web :');
define('_PNBBCODE_ENTER_TEXT_BOLD','Entrer le texte que vous voulez mettre en gras :');
define('_PNBBCODE_ENTER_TEXT_ITALIC','Entrer le texte que vous voulez mettre en italique :');
define('_PNBBCODE_ENTER_TEXT_UNDERLINE','entrez le texte � souligner');
define('_PNBBCODE_ENTER_URL','Entrez l\'URL du lien � ajouter :');
define('_PNBBCODE_ENTER_WEBIMAGE_URL','Entrez l\'URL de l\'image que vous voulre afficher :');
define('_PNBBCODE_FONTCOLOR', 'Couleur de la police');
define('_PNBBCODE_FONTSIZE', 'Taille de la police');
define('_PNBBCODE_IMAGE', 'Image');
define('_PNBBCODE_IMAGE_HINT', 'ins�rer une image');
define('_PNBBCODE_ITALIC', 'i');
define('_PNBBCODE_ITALIC_HINT', 'texte italique');
define('_PNBBCODE_LIST_HINT', 'insert list');
define('_PNBBCODE_LISTCLOSE', '/ul');
define('_PNBBCODE_LISTCLOSE_HINT', 'fin de liste');
define('_PNBBCODE_LISTITEM', 'li');
define('_PNBBCODE_LISTITEM_HINT', '�l�ment de liste');
define('_PNBBCODE_LISTOPEN', 'ul');
define('_PNBBCODE_LISTOPEN_HINT', 'debut de liste');
define('_PNBBCODE_MAIL', 'Adresse email');
define('_PNBBCODE_MAIL_HINT', 'ins�rer une adresse email');
define('_PNBBCODE_QUOTE', 'Quote');
define('_PNBBCODE_QUOTE_HINT', 'ins�rer une citation');
define('_PNBBCODE_SIZE_DEFINE', 'taille personnalis�e');
define('_PNBBCODE_SIZE_HINT', 'S�lectionner la taille de la police');
define('_PNBBCODE_SIZE_HUGE', 'G�ant');
define('_PNBBCODE_SIZE_LARGE', 'Grand');
define('_PNBBCODE_SIZE_NORMAL', 'Normal');
define('_PNBBCODE_SIZE_SMALL', 'Petit');
define('_PNBBCODE_SIZE_TEXTSIZE', 'entrer la taille du texte');
define('_PNBBCODE_SIZE_TINY', 'Minuscule');
define('_PNBBCODE_UNDERLINE', 'u');
define('_PNBBCODE_UNDERLINE_HINT', 'texte soulign�');
define('_PNBBCODE_URL', 'URL');
define('_PNBBCODE_URL_HINT', 'ins�rer un lien');
define('_PNBBCODE_CODE', 'Code');
define('_PNBBCODE_CODEBODYEND', 'Fin du corps du code');
define('_PNBBCODE_CODEBODYSTART', 'D�but du corps du code');
define('_PNBBCODE_CODEHEADEREND', 'Fin de l\'en-t�te du code');
define('_PNBBCODE_CODEHEADERSTART', 'D�but de l\'en-t�te du code');
define('_PNBBCODE_COLOR_ALLOWUSERCOLOR', 'Permettre � l\'utilisateur de d�finir des couleurs');
define('_PNBBCODE_COLOR_ENABLE', 'Permettre d\'autres couleurs de texte');
define('_PNBBCODE_CONFIGCHANGED', 'La configuration a �t� modifi�e');
define('_PNBBCODE_ENTER_WEBIMAGE_URL','Entrez l\'URL de l\'image que vous voulez afficher :');
define('_PNBBCODE_NO', 'Non');
define('_PNBBCODE_NOAUTH', 'Pas de permission');
define('_PNBBCODE_PNADMINISTRATION', 'Administration');
define('_PNBBCODE_PREVIEW','Aper�u');
define('_PNBBCODE_QUOTE', 'Citation');
define('_PNBBCODE_QUOTEBODYEND', 'Fin du corps de citation');
define('_PNBBCODE_QUOTEBODYSTART', 'D�but du corps de citation');
define('_PNBBCODE_QUOTEHEADEREND', 'Fin de l\'en-t�te de citation');
define('_PNBBCODE_QUOTEHEADERSTART', 'D�but de l\'en-t�te de citation');
define('_PNBBCODE_SIZE_ALLOWUSERSIZE', 'Permettre � l\'utilisateur de d�finir des tailles de texte');
define('_PNBBCODE_SIZE_ENABLE', 'Permettre d\'autres tailles de texte');
define('_PNBBCODE_SIZE_HUGE', 'G�ant');
define('_PNBBCODE_SIZE_LARGE', 'Grand');
define('_PNBBCODE_SIZE_NORMAL', 'Normal');
define('_PNBBCODE_SIZE_SMALL', 'Petit');
define('_PNBBCODE_SIZE_TINY', 'Minuscule');
define('_PNBBCODE_YES', 'Oui');
