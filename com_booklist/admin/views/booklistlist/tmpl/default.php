<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_booklist
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>
<form action="index.php?option=com_booklist&view=booklistlist" method="post" id="adminForm" name="adminForm">
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%">
				<?php echo JText::_('COM_BOOKLIST_NUM'); ?>
			</th>
			<th width="2%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>
			<th width="5%">
				<?php echo JText::_('COM_BOOKLIST_IMAGE') ;?>
			</th>
			<th width="5%">
				<?php echo JText::_('COM_BOOKLIST_CONTENT') ;?>
			</th>
			<th width="45%">
				<?php echo JText::_('COM_BOOKLIST_TITLE') ;?>
			</th>
			<th width="10%">
				<?php echo JText::_('COM_BOOKLIST_EDITION') ;?>
			</th>
			<th width="5%">
				<?php echo JText::_('COM_BOOKLIST_YEAR') ;?>
			</th>
			<th width="20%">
				<?php echo JText::_('COM_BOOKLIST_AUTHORS') ;?>
			</th>
			<th width="5%">
				<?php echo JText::_('COM_BOOKLIST_PUBLISHED'); ?>
			</th>
			<th width="2%">
				<?php echo JText::_('COM_BOOKLIST_ID'); ?>
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
					$link = JRoute::_('index.php?option=com_booklist&task=booklist.edit&id=' . $row->id);
				?>
					<tr>
						<td>
							<?php echo $this->pagination->getRowOffset($i); ?>
						</td>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<img src="<?php echo JURI::root() . $row->cover_image; ?>" width="120px">
						</td>
						<td>
							<?php echo $row->content_id; ?>
						</td>
						<td>
							<a href="<?php echo $link; ?>" title="<?php echo JText::_('COM_BOOKLIST_EDIT_BOOKLIST'); ?>">
								<?php echo $row->title; ?>
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
						<td align="center">
							<?php echo JHtml::_('jgrid.published', $row->published, $i, 'booklistlist.', true, 'cb'); ?>
						</td>
						<td align="center">
							<?php echo $row->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" value=""/>
	<input type="hidden" name="boxchecked" value="0"/>
	<?php echo JHtml::_('form.token'); ?>
</form>