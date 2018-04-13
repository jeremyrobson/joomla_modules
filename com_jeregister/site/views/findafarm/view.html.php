<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewFindAFarm extends JViewLegacy
{

    public function display($tpl = null)
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT * FROM `#__farm_profile`");
        $db->query();
        $farm_profiles = $db->loadObjectList("id");
        
        foreach ($farm_profiles as $id => $farm_profile) {
            $farm_profiles[$id]->profile_link = Juri::root() . "index.php?option=com_jeregister&view=farmprofile&id=$id";
        }

        $this->farm_profiles = json_encode($farm_profiles, JSON_FORCE_OBJECT);

        parent::display($tpl);
        
        $this->setDocument();
    }

    protected function setDocument()
    {
        $GOOGLE_API_KEY = "AIzaSyAjNtOu6POzKyKwp7U3OgUfRkOaPcXtr90";

        JHtml::_('jquery.framework');

        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_JEREGISTER_FARMMAP'));
        $document->addScript("http://maps.googleapis.com/maps/api/js?key=$GOOGLE_API_KEY");
        $document->addScript(JURI::root() . "administrator/components/com_jeregister/models/forms/findafarm.js");
        $document->addScriptDeclaration("
            var farm_profiles = $this->farm_profiles;
        ");
    }
}