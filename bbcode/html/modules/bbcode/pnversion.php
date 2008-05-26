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
 * @subpackage bbcode
 * @license http://www.gnu.org/copyleft/gpl.html
*/

$modversion['name']             = 'bbcode';
$modversion['oldnames']         = array('pn_bbcode');
$modversion['version']          = '2.0';
$modversion['id'] 				= '164';
$modversion['description']      = 'BBCode Hook';
$modversion['credits']          = 'pndocs/credits.txt';
$modversion['help']             = 'pndocs/help.txt';
$modversion['changelog']        = 'pndocs/changelog.txt';
$modversion['license']          = 'pndocs/license.txt';
$modversion['coding']           = 'pndocs/coding.txt';
$modversion['official']         = 0;
$modversion['author']           = 'pnForum team';
$modversion['contact']          = 'http://www.pnforum.de';
$modversion['admin']            = 1;
$modversion['securityschema']   = array('bbcode:Modulename:Links'  => '::',
                                        'bbcode:Modulename:Emails' => '::');
