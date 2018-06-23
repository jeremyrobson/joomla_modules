<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterViewFarmProfile extends JViewLegacy
{

    public function display($tpl = null)
    {
        $jinput = JFactory::getApplication()->input;
        $profile_id = $jinput->get("id");

        if (empty($profile_id)) {
            JError::raiseError(404, "That profile does not exist!");
        };

        $db = JFactory::getDbo();
        $db->setQuery("SELECT * FROM `#__farm_profile` WHERE id = $profile_id");
        $db->query();
        $farm_profiles = $db->loadObjectList("id");
        $farm_profile = reset($farm_profiles);

        $this->profile = $farm_profile;
        $this->farm_profile = json_encode($farm_profile, JSON_FORCE_OBJECT);

        parent::display($tpl);
        
        $this->setDocument();
    }

    protected function setDocument()
    {
        $params = JComponentHelper::getParams('com_jeregister');

        JHtml::_('jquery.framework');

        $document = JFactory::getDocument();
        $document->setTitle(JText::_('COM_JEREGISTER_FARMPROFILE'));
        $document->addScriptDeclaration("
            var farm_profile = $this->farm_profile;
        ");
    }
}
