<?php
    defined('_JEXEC') or die;

    require_once dirname(__FILE__) . '/helper.php';

    $config = JFactory::getConfig();
    $files = array();

    for ($i = 0; $i < 6; $i++) {
        $image = $params->get("lightslider_image_$i");
        $url = $params->get("lightslider_url_$i");
        if (!empty($image) && !empty($url)) {
            $files[] = array(
                "image" => $image,
                "url" => $url
            );
        }
    }
    
    //$image_paths = scandir(JPATH_BASE . "/" . $images_path);
    //$files = preg_grep("/.*\.(jpg|jpeg|png|gif)$/", $image_paths);
    //$files = preg_filter('/^/', JURI::base() . $images_path . "/", $files);

    $document = JFactory::getDocument();
    $document->addScript('modules/mod_lightslider/js/lightslider.min.js');
    $document->addStyleSheet('modules/mod_lightslider/css/lightslider.min.css');

    require JModuleHelper::getLayoutPath('mod_lightslider');
?>