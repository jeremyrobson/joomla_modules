<?php
defined('_JEXEC') or die;

require_once dirname(__FILE__) . '/helper.php';

$document = JFactory::getDocument();
$document->addScript('modules/mod_lightslider/js/lightslider.min.js');
$document->addStyleSheet('modules/mod_lightslider/css/lightslider.min.css');

$config = JFactory::getConfig();
$images_path = $config->get('images_path');
$image_paths = scandir($images_path);

echo "<h1>";
print_r($images_path);
print_r($image_paths);
echo "</h1>";

//$ls = modLightSliderHelper::getHello($params);
require JModuleHelper::getLayoutPath('mod_lightslider');