<?php
defined('_JEXEC') or die('Restricted Access');

?>
<form action="<?php echo JRoute::_('index.php?option=com_jeregister'); ?>"  method="POST" id="adminForm" name="adminForm">
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%"><?php echo JText::_('COM_JEREGISTER_NUM'); ?></th>
			<th width="1%"><?php echo JHtml::_('grid.checkall'); ?></th>
			<th width="5%"><?php echo JText::_('COM_JEREGISTER_PROFILE_FARM_NAME'); ?></th>
			<th width="5%"><?php echo JText::_('COM_JEREGISTER_PROFILE_ADDRESS'); ?></th>
			<th width="2%"><?php echo JText::_('COM_JEREGISTER_PROFILE_CITY'); ?></th>
			<th width="1%"><?php echo JText::_('COM_JEREGISTER_PROFILE_PROVINCE'); ?></th>
			<th width="2%"><?php echo JText::_('COM_JEREGISTER_PROFILE_POSTAL_CODE'); ?></th>
			<th width="5%"><?php echo JText::_('COM_JEREGISTER_PROFILE_CONTACT'); ?></th>
			<th width="3%"><?php echo JText::_('COM_JEREGISTER_PROFILE_TELEPHONE'); ?></th>
			<th width="4%"><?php echo JText::_('COM_JEREGISTER_PROFILE_EMAIL'); ?></th>
			<th width="5%"><?php echo JText::_('COM_JEREGISTER_PROFILE_WEBSITE'); ?></th>
			<th width="7%"><?php echo JText::_('COM_JEREGISTER_PROFILE_ACRES'); ?></th>
			<th width="10%"><?php echo JText::_('COM_JEREGISTER_PROFILE_OTHER_CROPS'); ?></th>
			<th width="10%"><?php echo JText::_('COM_JEREGISTER_PROFILE_DESCRIPTION'); ?></th>
			<th width="2%"><?php echo JText::_('COM_JEREGISTER_PROFILE_LATITUDE'); ?></th>
			<th width="2%"><?php echo JText::_('COM_JEREGISTER_PROFILE_LONGITUDE'); ?></th>
			<th width="4%"><?php echo JText::_('COM_JEREGISTER_PROFILE_FACEBOOK'); ?></th>
			<th width="6%"><?php echo JText::_('COM_JEREGISTER_PROFILE_TAGS'); ?></th>
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
						<td><?php echo $this->pagination->getRowOffset($i); ?></td>
						<td><?php echo JHtml::_('grid.id', $i, $i); ?></td>
						<td><?php echo $row->farm_name ?? "null"; ?></td>
						<td><?php echo $row->address ?? "null"; ?></td>
						<td><?php echo $row->city ?? "null"; ?>	</td>
						<td><?php echo $row->province ?? "null"; ?></td>
						<td><?php echo $row->postal_code ?? "null"; ?></td>
						<td><?php echo $row->contact ?? "null"; ?></td>
						<td><?php echo $row->telephone ?? "null"; ?></td>
						<td><?php echo $row->email ?? "null"; ?></td>
						<td><?php echo $row->website ?? "null"; ?></td>
						<td>
							<?php
								$arr = array(
									floatval($row->acres_strawberry) ?? 0,
									floatval($row->acres_raspberry) ?? 0,
									floatval($row->acres_blueberry) ?? 0,
									floatval($row->acres_fall_strawberry) ?? 0,
									floatval($row->acres_fall_raspberry) ?? 0
								);
								echo implode(", ", $arr);
							?>
						</td>
						<td><?php echo $row->other_crops ?? "null"; ?></td>
						<td><?php echo $row->description ?? "null"; ?></td>
						<td><?php echo $row->latitude ?? "null"; ?></td>
						<td><?php echo $row->longitude ?? "null"; ?></td>
						<td><?php echo $row->facebook ?? "null"; ?></td>
						<td><?php echo $row->tags ?? "null"; ?></td>
					</tr>
				<?php endforeach; ?>
			<?php endif; ?>
		</tbody>
	</table>

        <div class="btn-toolbar">
                <div class="btn-group">
                        <button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('registrations.process1')">
                                <span class="icon-ok"></span><?php echo JText::_('COM_JEREGISTER_UPLOAD_SELECTED') ?>
                        </button>
                </div>
                <div class="btn-group">
                        <button type="button" class="btn" onclick="Joomla.submitbutton('registrations.cancel')">
                                <span class="icon-cancel"></span><?php echo JText::_('JCANCEL') ?>
                        </button>
                </div>
        </div>

	<input type="hidden" name="filename" value="<?php echo $this->filename; ?>" />
        <input type="hidden" name="task" value="" />
        <?php echo JHtml::_('form.token'); ?> 
</form>
