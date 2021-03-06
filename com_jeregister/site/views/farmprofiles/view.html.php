<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewFarmProfiles extends JViewLegacy
{

    public function display($tpl = null)
    {
        $jinput = JFactory::getApplication()->input;
        
        $db = JFactory::getDbo();
        $db->setQuery("SELECT * FROM `#__farm_profile` WHERE `published` = 1 ORDER BY `farm_name` ASC");
        $db->query();
        $farm_profiles = $db->loadObjectList("id");

        $this->farm_profiles = $farm_profiles;

        $this->berry_types = array(
            "strawberries" => "Strawberries",
            "everbearing-strawberries" => "Everbearing-Strawberries",
            "summer-raspberries" => "Summer Raspberries",
            "fall-raspberries" => "Fall Raspberries",
            "black-raspberries" => "Black Raspberries",
            "blackberries" => "Blackberries",
            "blueberries" => "Blueberries",
            //"cranberries" => "Cranberries",
            //"saskatoon-berries" => "Saskatoon Berries",
            //"currants" => "Currants",
            //"gooseberries" =>"Gooseberries",
            //"elderberries" => "Elderberries",
            //"haskaps" => "Haskaps",
            //"sea-buckthorn" => "Sea Buckthorn"
        );

        parent::display($tpl);
        
        $this->setDocument();
    }

    protected function setDocument()
    {
        JHtml::_('jquery.framework');

        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_JEREGISTER_FARMPROFILES'));
    }
}
