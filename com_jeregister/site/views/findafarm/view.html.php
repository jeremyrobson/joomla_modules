<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewFindAFarm extends JViewLegacy
{

    public function display($tpl = null)
    {
        $db = JFactory::getDbo();
        $db->setQuery("SELECT * FROM `#__farm_profile` WHERE `published` = 1");
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
        $params = JComponentHelper::getParams('com_jeregister');
        $GOOGLE_API_KEY = $params->get('google_maps_api_key');

        JHtml::_('jquery.framework');

        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_JEREGISTER_FARMMAP'));
        $document->addScript("https://maps.googleapis.com/maps/api/js?key=$GOOGLE_API_KEY");
        $document->addScript(JURI::root() . "administrator/components/com_jeregister/models/forms/findafarm.js");
        $document->addScriptDeclaration("
            var farm_profiles = $this->farm_profiles;
        ");
    }
}
