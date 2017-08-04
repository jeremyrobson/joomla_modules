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

<form action="index.php?option=com_booklist&view=booklistlist" method="post" id="booklistForm" name="booklistForm">
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%">
				<?php echo JText::_('COM_BOOKLIST_NUM'); ?>
			</th>
			<th width="5%">
				<?php echo JText::_('COM_BOOKLIST_IMAGE') ;?>
			</th>
			<th width="35%">
				<?php echo JText::_('COM_BOOKLIST_TITLE') ;?>
			</th>
			<th width="10%">
				<?php echo JText::_('COM_BOOKLIST_EDITION') ;?>
			</th>
			<th width="10%">
				<?php echo JText::_('COM_BOOKLIST_YEAR') ;?>
			</th>
			<th width="20%">
				<?php echo JText::_('COM_BOOKLIST_AUTHORS') ;?>
			</th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="5">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) :
					$image_link = JURI::root() . $row->cover_image;
					//$view_link = JRoute::_('index.php?option=com_booklist&task=display&id=' . $row->id);
					$view_link = JRoute::_('index.php?option=com_content&view=article&id=' . $row->content_id);
				?>
					<tr>
						<td>
							<?php echo $this->pagination->getRowOffset($i); ?>
						</td>
						<td>
							<a href="<?php echo $view_link; ?>">
								<img src="<?php echo $image_link; ?>" width="120px">
							</a>
						</td>
						<td>
							<a href="<?php echo $view_link; ?>">
								<?php echo $row->booklist_title; ?>
							</a>
						</td>
						<td>
							<?php echo $row->edition; ?>
						</td>
						<td>
							<?php echo $row->publish_year; ?>
						</td>
						<td>
							<?php echo $row->authors; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<?php echo JHtml::_('form.token'); ?>
</form>