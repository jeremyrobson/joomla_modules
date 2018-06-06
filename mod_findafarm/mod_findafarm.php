<?php
    defined('_JEXEC') or die;

    require_once dirname(__FILE__) . '/helper.php';

    $farm_profiles = modFindAFarmHelper::getFarms();

    $farm_profiles = json_encode($farm_profiles, JSON_FORCE_OBJECT);

    $google_api_key = $params->get("google_api_key");

    JHtml::_('jquery.framework');

    $document = JFactory::getDocument();
    $document->setTitle(JText::_('Find a Farm'));
    $document->addScript("http://maps.googleapis.com/maps/api/js?key=$google_api_key");
    $document->addScript("modules/mod_findafarm/js/findafarm.js");
    $document->addScriptDeclaration("
        var farm_profiles = $farm_profiles;
    ");

    require JModuleHelper::getLayoutPath('mod_findafarm');
?>