<?php
defined('_JEXEC') or die('Restricted Access');


?>
<form action="index.php?option=com_jeregister&view=profiles" method="post" id="adminForm" name="adminForm">
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%">
				<?php echo JText::_('COM_JEREGISTER_NUM'); ?>
			</th>
			<th width="2%">
				<?php echo JHtml::_('grid.checkall'); ?>
			</th>
			<th width="15%">
				<?php echo JText::_('COM_JEREGISTER_USERNAME'); ?>
			</th>
			<th width="30%">
				<?php echo JText::_('COM_JEREGISTER_FARM_NAME'); ?>
			</th>
			<th width="20%">
				<?php echo JText::_('COM_JEREGISTER_CONTACT'); ?>
			</th>
			<th width="15%">
				<?php echo JText::_('COM_JEREGISTER_EMAIL'); ?>
			</th>
			<th width="15%">
				<?php echo JText::_('COM_JEREGISTER_ACTIONS'); ?>
			</th>
			<th width="2%">
				<?php echo JText::_('COM_JEREGISTER_ID'); ?>
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
				<?php foreach ($this->items as $i => $row) : ?>
					<tr>
						<td>
							<?php echo $this->pagination->getRowOffset($i); ?>
						</td>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<a href="<?php echo JUri::base(); ?>index.php?option=com_users&task=user.edit&id=<?php echo $row->id; ?>">
								<?php echo $row->username; ?>
							</a>
						</td>
						<td>
							<?php echo $row->farm_name; ?>
						</td>
						<td>
							<?php echo $row->contact; ?>
						</td>
						<td>
							<?php echo $row->email; ?>
						</td>
						<td>
							<a href="<?php echo JUri::base(); ?>index.php?option=com_jeregister&task=profile.edit&id=<?php echo $row->id; ?>">
								View Profile
							</a>
						</td>
						<td align="center">
							<?php echo $row->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>
</form>
