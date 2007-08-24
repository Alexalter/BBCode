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

    $pnr = pnRender::getInstance('pn_bbcode', false, null, true);
    return $pnr->fetch('pn_bbcode_admin_main.html');
}

/**
 * codeconfig
 *
 */
function pn_bbcode_admin_codeconfig()
{
    if (!SecurityUtil::checkPermission('pn_bbcode::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError('index.php');
    }

    Loader::requireOnce('modules/pn_bbcode/pnincludes/pn_bbcode_admin_codeconfighandler.class.php');

    // Create output object
    $pnf = FormUtil::newpnForm('pn_bbcode');

    // Return the output that has been generated by this function
    return $pnf->pnFormExecute('pn_bbcode_admin_codeconfig.html', new pn_bbcode_admin_codeconfighandler());
}

/**
 * quoteconfig
 *
 */
function pn_bbcode_admin_quoteconfig()
{
    if (!SecurityUtil::checkPermission('pn_bbcode::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError('index.php');
    }

    Loader::requireOnce('modules/pn_bbcode/pnincludes/pn_bbcode_admin_quoteconfighandler.class.php');

    // Create output object
    $pnf = FormUtil::newpnForm('pn_bbcode');

    // Return the output that has been generated by this function
    return $pnf->pnFormExecute('pn_bbcode_admin_quoteconfig.html', new pn_bbcode_admin_quoteconfighandler());
}

/**
 * sizeconfig
 *
 */
function pn_bbcode_admin_sizeconfig()
{
    if (!SecurityUtil::checkPermission('pn_bbcode::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError('index.php');
    }

    Loader::requireOnce('modules/pn_bbcode/pnincludes/pn_bbcode_admin_sizeconfighandler.class.php');

    // Create output object
    $pnf = FormUtil::newpnForm('pn_bbcode');

    // Return the output that has been generated by this function
    return $pnf->pnFormExecute('pn_bbcode_admin_sizeconfig.html', new pn_bbcode_admin_sizeconfighandler());
}

/**
 * colorconfig
 *
 */
function pn_bbcode_admin_colorconfig()
{
    if (!SecurityUtil::checkPermission('pn_bbcode::', "::", ACCESS_ADMIN)) {
        return LogUtil::registerPermissionError('index.php');
    }

    Loader::requireOnce('modules/pn_bbcode/pnincludes/pn_bbcode_admin_colorconfighandler.class.php');

    // Create output object
    $pnf = FormUtil::newpnForm('pn_bbcode');

    // Return the output that has been generated by this function
    return $pnf->pnFormExecute('pn_bbcode_admin_colorconfig.html', new pn_bbcode_admin_colorconfighandler());
}
