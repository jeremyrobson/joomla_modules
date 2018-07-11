<?php
    defined('_JEXEC') or die;

    require_once dirname(__FILE__) . '/helper.php';

    $jinput = JFactory::getApplication()->input;

    $farm_profiles = null;
    $farm_profile = null;
    $profile_id = $jinput->getInteger("profile_id");

    if (!empty($profile_id)) {
        $layout = "profile";
        $farm_profile = modFindAFarmHelper::getProfile($profile_id);
        $title = $farm_profile->farm_name;
    }
    else {
        $layout = "default";
        $farm_profiles = modFindAFarmHelper::getFarms();
        $title = 'Find a Farm by Location';
    }

    $farm_profile_json = json_encode($farm_profile, JSON_FORCE_OBJECT);
    $farm_profiles_json = json_encode($farm_profiles, JSON_FORCE_OBJECT);

    $google_api_key = $params->get("google_api_key");

    JHtml::_('jquery.framework');

    $document = JFactory::getDocument();
    $document->setTitle($title);
    $document->addScript("https://maps.googleapis.com/maps/api/js?key=$google_api_key");
    $document->addScript("modules/mod_findafarm/js/markerclusterer.js");
    $document->addScript("modules/mod_findafarm/js/findafarm.js");
    $document->addScriptDeclaration("
        var farm_profiles = $farm_profiles_json;
        var farm_profile = $farm_profile_json;
    ");

    require JModuleHelper::getLayoutPath('mod_findafarm', $layout);
?>