<?php
    // No direct access
    defined('_JEXEC') or die;

    // Include the syndicate functions only once
    require_once dirname(__FILE__) . '/helper.php';

    $header = modJerNewsHelper::getHeader($params);

    $categoryId = modJerNewsHelper::getCategoryId($params);

    $options    = array();
    $categories = JCategories::getInstance('Content', $options);
    $category   = $categories->get($categoryId);
    
    $articles = modJerNewsHelper::getArticles($categoryId);
    require JModuleHelper::getLayoutPath('mod_jernews');
?>