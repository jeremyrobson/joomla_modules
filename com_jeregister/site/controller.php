<?php

defined('_JEXEC') or die('Restricted access');

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
            case "farmprofile":
                $page = "farmprofile";
                break;
            case "farmprofiles":
                $page = "farmprofiles";
                break;
            default:
                $page = $app->getUserState("com_jeregister.page", "declaration");
                break;
        }
        JRequest::setVar('view', $page);
        JRequest::setVar('layout', $page);

        parent::display($cachable, $urlparams);
    }
}