<?php
defined('_JEXEC') or die('Restricted Access');


?>
<form action="index.php?option=com_jeregister&view=registrations" method="post" id="adminForm" name="adminForm">
	<table class="table table-striped table-hover">
		<thead>
            <tr>
                <th width="1%">
                    <?php echo JText::_('COM_JEREGISTER_NUM'); ?>
                </th>
                <th width="2%">
                    <?php echo JHtml::_('grid.checkall'); ?>
                </th>
                <th width="30%">
                    <?php echo JText::_('COM_JEREGISTER_USERNAME'); ?>
                </th>
                <th width="30%">
                    <?php echo JText::_('COM_JEREGISTER_PROFILE_EMAIL'); ?>
                </th>
                <th width="35%">
                    <?php echo JText::_('COM_JEREGISTER_PROFILE_FARM_NAME'); ?>
                </th>
                <th width="2%">
                    <?php echo JText::_('COM_JEREGISTER_ID'); ?>
                </th>
            </tr>
		</thead>
		<tfoot>
			<tr>
				<td colspan="6">
					<?php //echo $this->pagination->getListFooter(); ?>
				</td>
			</tr>
		</tfoot>
		<tbody>
			<?php if (!empty($this->items)) : ?>
				<?php foreach ($this->items as $i => $row) : ?>
					<tr>
						<td>
							<?php //echo $this->pagination->getRowOffset($i); ?>
						</td>
						<td>
							<?php echo JHtml::_('grid.id', $i, $row->id); ?>
						</td>
						<td>
							<?php echo $row->username; ?>
						</td>
						<td>
                            <?php echo $row->email; ?>
						</td>
						<td>
							<?php echo $row->name; ?>
						</td>
						<td align="center">
							<?php echo $row->id; ?>
						</td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>

	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>
