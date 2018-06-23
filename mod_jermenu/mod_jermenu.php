<?php

defined('_JEXEC') or die;

JLoader::register('ModJerMenuHelper', __DIR__ . '/helper.php');

$baseUrl = JUri::base();
$logo = "";

$list       = ModJerMenuHelper::getList($params);
$base       = ModJerMenuHelper::getBase($params);
$active     = ModJerMenuHelper::getActive($params);
$default    = ModJerMenuHelper::getDefault();
$active_id  = $active->id;
$default_id = $default->id;
$path       = $base->tree;
$showAll    = $params->get('showAllChildren');
$class_sfx  = htmlspecialchars($params->get('class_sfx'), ENT_COMPAT, 'UTF-8');

//echo '<pre>'; print_r($list); die;

if (count($list))
{
	require JModuleHelper::getLayoutPath('mod_jermenu', $params->get('layout', 'default'));
}