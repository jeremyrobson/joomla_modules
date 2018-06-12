<?php
defined('_JEXEC') or die('Restricted Access');

?>
<form action="index.php?option=com_jeregister&view=transactions" method="POST" id="adminForm" name="adminForm">
	<input type="hidden" name="user_id" value="<?php echo $this->user_id; ?>" />

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
				<?php echo JText::_('COM_JEREGISTER_TRANSACTION_USERNAME'); ?>
			</th>
			<th width="40%">
				<?php echo JText::_('COM_JEREGISTER_TRANSACTION_MEMBERSHIP_FEE'); ?>
			</th>
			<th width="20%">
				<?php echo JText::_('COM_JEREGISTER_TRANSACTION_PAYMENT_METHOD'); ?>
			</th>
			<th width="15%">
				<?php echo JText::_('COM_JEREGISTER_TRANSACTION_DATE'); ?>
			</th>
			<th width="5%">
				<?php echo JText::_('COM_JEREGISTER_TRANSACTION_STATUS'); ?>
			</th>
			<th width="2%">
				<?php echo JText::_('COM_JEREGISTER_TRANSACTION_ID'); ?>
			</th>
		</tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="8">
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
							<a href="<?php echo JUri::base(); ?>index.php?option=com_users&task=user.edit&id=<?php echo $row->user_id; ?>">
								<?php echo $row->username; ?>
							</a>
						</td>
						<td>
							<?php echo $row->membership_fee ?? "Unknown"; ?>
						</td>
						<td>
							<?php echo $row->payment_method ?? "Unknown"; ?>
						</td>
						<td>
							<?php echo $row->date; ?>
						</td>
						<td>
							<?php echo $row->status; ?>
						</td>
						<td align="center">
							<?php echo $row->id ?? "Unknown"; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>

	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>

</form>
