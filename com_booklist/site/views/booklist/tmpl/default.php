<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_booklist
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
 
// No direct access to this file
defined('_JEXEC') or die('Restricted access');
?>

<h1>
    <?php echo $this->header; ?>
</h1>
<h5>
    <a href="<?php echo JRoute::_('index.php?option=com_booklist&view=booklistlist'); ?>">Back</a>
</h5>

<div class="form-horizontal">
    <div class="row">
        <div class="col-md-3">
            <img src="<?php echo JURI::root() . $this->item->cover_image; ?>" width="120px">
        </div>
        <div class="col-md-9">
            <h2><?php echo $this->item->title; ?></h2>
            <h3><?php echo $this->item->edition; ?></h3>
            <h4><?php echo $this->item->authors; ?></h4>
            <h5><?php echo $this->item->publish_year; ?></h5>
        </div>
    </div>
</div>