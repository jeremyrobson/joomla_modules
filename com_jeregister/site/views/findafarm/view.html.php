<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewFindAFarm extends JViewLegacy
{

	public function display($tpl = null)
	{

        //$this->item = $this->get("Item");

		$db = JFactory::getDbo();
		$db->setQuery("SELECT * FROM `#__farm_profile`");
		$db->query();
		$this->farm_profiles = json_encode($db->loadObjectList("id"), JSON_FORCE_OBJECT);

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
