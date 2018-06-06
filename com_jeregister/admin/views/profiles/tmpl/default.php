<?php
defined('_JEXEC') or die('Restricted Access');

echo "<pre>"; print_r($this->sortColumn); echo "</pre>";
?>
<form action="index.php?option=com_jeregister&view=profiles" method="post" id="adminForm" name="adminForm">
    <div class="row-fluid">
        <div class="span6">
            <?php
                //requires models/forms/filter_profiles.xml
                echo JLayoutHelper::render('joomla.searchtools.default', array('view' => $this));
            ?>
        </div>
    </div>

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
                <?php echo JHtml::_('grid.sort', 'COM_JEREGISTER_USERNAME', 'b.username', $this->sortDirection, $this->sortColumn); ?>
			</th>
			<th width="25%">
				<?php echo JHtml::_('grid.sort', 'COM_JEREGISTER_PROFILE_FARM_NAME', 'a.farm_name', $this->sortDirection, $this->sortColumn); ?>
			</th>
			<th width="20%">
                <?php echo JHtml::_('grid.sort', 'COM_JEREGISTER_PROFILE_CONTACT', 'a.contact', $this->sortDirection, $this->sortColumn); ?>
			</th>
			<th width="15%">
                <?php echo JHtml::_('grid.sort', 'COM_JEREGISTER_PROFILE_EMAIL', 'a.email', $this->sortDirection, $this->sortColumn); ?>
			</th>
			<th width="15%">
				<?php echo JText::_('COM_JEREGISTER_ACTIONS'); ?>
			</th>
			<th width="5%">
				<?php echo JHtml::_('grid.sort', 'COM_JEREGISTER_PAYMENT_STATUS', 'a.status', $this->sortDirection, $this->sortColumn); ?>
			</th>
			<th width="2%">
				<?php echo JText::_('COM_JEREGISTER_ID'); ?>
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
								Profile
							</a>
							&nbsp;
							<a href="<?php echo JUri::base(); ?>index.php?option=com_jeregister&view=declarations&id=<?php echo $row->id; ?>">
								Declaration
							</a>
							&nbsp;
							<a href="<?php echo JUri::base(); ?>index.php?option=com_jeregister&task=transactions.view&user_id=<?php echo $row->id; ?>">
								Transactions
							</a>
						</td>
						<td>
							<?php if ($row->payment_status == "paid"): ?>
								<div class="label label-success"><i class="icon-checkmark"></i>&nbsp;Paid</div>
							<?php else: ?>
								<div class="label label-danger"><i class="icon-remove"></i>&nbsp;Not paid</div>
							<?php endif; ?>
						</td>
						<td align="center">
							<?php echo $row->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>

	<input type="hidden" name="filter_order" value="<?php echo $this->sortColumn; ?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->sortDirection; ?>" />
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>
