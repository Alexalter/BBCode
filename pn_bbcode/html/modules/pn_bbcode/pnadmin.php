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

function pn_bbcode_admin_main()
{
    if (!SecurityUtil::checkPermission('pn_bbcode::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError('index.php');
    }

    $hmods = pnModAPIFunc('modules', 'admin', 'gethookedmodules', array('hookmodname' => 'pn_bbcode'));
    foreach($hmods as $hmod => $dummy) {
        $modid = pnModGetIDFromName($hmod);
        $moddata = pnModGetInfo($modid);
        $moddata['id'] = $modid;
        $hookedmodules[] = $moddata;
    }

    $pnr = pnRender::getInstance('pn_bbcode', false, null, true);
    $pnr->assign('hookedmodules', $hookedmodules);
    return $pnr->fetch('pn_bbcode_admin_main.html');
}

/**
 * configuration
 *
 */
function pn_bbcode_admin_config()
{
    if (!SecurityUtil::checkPermission('pn_bbcode::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError('index.php');
    }

    Loader::requireOnce('modules/pn_bbcode/pnincludes/pn_bbcode_admin_confighandler.class.php');

    // Create output object
    $pnf = FormUtil::newpnForm('pn_bbcode');

    // Return the output that has been generated by this function
    return $pnf->pnFormExecute('pn_bbcode_admin_config.html', new pn_bbcode_admin_confighandler());
}
