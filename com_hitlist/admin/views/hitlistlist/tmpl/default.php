<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_hitlist
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted Access');
?>

<form action="index.php?option=com_hitlist&view=hitlistlist" method="post" id="adminForm" name="adminForm">
	<?php foreach ($this->form->getFieldset() as $field): ?>
		<div class="control-group">
			<div class="control-label"><?php echo $field->label; ?></div>
			<div class="controls"><?php echo $field->input; ?></div>
		</div>
	<?php endforeach; ?>

	<button type="button" onclick="update_list()" id="update_button" name="update_button" value="update" class="btn btn-primary">Update</button>
	<button type="button" onclick="clear_list()" id="clear_button" name="clear_button" value="clear" class="btn btn-primary">Clear</button>

	<br>
	<br>

	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%">
				<?php echo JText::_('COM_HITLIST_NUM'); ?>
			</th>
			<th width="35%">
				<?php echo JText::_('COM_HITLIST_TITLE') ;?>
			</th>
			<th width="10%">
				<?php echo JText::_('COM_HITLIST_HITS') ;?>
			</th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="10">
					<?php echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) : ?>
					<tr>
						<td>
							<?php echo $this->pagination->getRowOffset($i); ?>
						</td>
						<td>
							<?php echo $row->title; ?>
						</td>
						<td align="center">
							<?php echo $row->hits; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
	<input type="hidden" name="task" id="task" value=""/>
	<?php echo JHtml::_('form.token'); ?>
</form>

<script>

function update_list() {
	$("#task").val("update");
	$("#adminForm").submit();
}

function clear_list() {
	$("#task").val("clear");
	$("#adminForm").submit();
}

</script>