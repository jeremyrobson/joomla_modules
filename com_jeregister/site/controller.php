<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_helloworld
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
/**
 * Hello World Component Controller
 *
 * @since  0.0.1
 */
class JeRegisterController extends JControllerLegacy
{
    public function display($cachable = false, $urlparams = false)
    {
        $app = JFactory::getApplication();
        
        $view = JRequest::getVar("view");

        switch ($view) {
            case "findafarm":
                $page = "findafarm";
                break;
            case "declaration":
                $page = $app->getUserState("com_jeregister.page", "declaration");
                break;
        }

        JRequest::setVar('view', $page);
        JRequest::setVar('layout', $page);

        parent::display($cachable, $urlparams);
    }
}