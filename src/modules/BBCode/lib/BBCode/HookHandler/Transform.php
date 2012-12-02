<?php

/**
 * @package Zikula_Utility_Modules
 * @subpackage BBCode
 * @license http://www.gnu.org/copyleft/gpl.html
 */
class BBCode_HookHandler_Transform extends Zikula_Hook_AbstractHandler
{
    /*
     * filter hook
     *
     */

    public static function filter(Zikula_FilterHook $hook)
    {
        PageUtil::addVar('stylesheet', ThemeUtil::getModuleStylesheet('BBCode'));
        $data = ModUtil::apiFunc('BBCode', 'user', 'transform', array('message' => $hook->getData()));
        $hook->setData($data);
    }

}