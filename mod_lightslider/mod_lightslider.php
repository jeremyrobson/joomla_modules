<?php
    defined('_JEXEC') or die;

    require_once dirname(__FILE__) . '/helper.php';

    $config = JFactory::getConfig();
    $images_path = $params->get("images_path");
    //todo: error handling if path is not valid
    $image_paths = scandir(JPATH_BASE . "/" . $images_path);

    //todo: error handling if no files are in path

    //echo "<pre>"; print_r($image_paths); echo '</pre>';

    $files = preg_grep("/.*\.(jpg|jpeg|png|gif)$/", $image_paths);
    $files = preg_filter('/^/', JURI::base() . $images_path . "/", $files);

    //todo: error handling if no valid images are found in folder

    //echo "<pre>"; print_r($files); echo '</pre>';

    $document = JFactory::getDocument();
    $document->addScript('modules/mod_lightslider/js/lightslider.min.js');
    $document->addStyleSheet('modules/mod_lightslider/css/lightslider.min.css');

    require JModuleHelper::getLayoutPath('mod_lightslider');
?>