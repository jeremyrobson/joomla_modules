<?php
defined('_JEXEC') or die('Restricted Access');

?>
<form action="<?php echo JRoute::_('index.php?option=com_jeregister'); ?>"  method="POST" id="adminForm" name="adminForm">
	<table class="table table-striped table-hover">
		<thead>
		<tr>
			<th width="1%"><?php echo JText::_('COM_JEREGISTER_NUM'); ?></th>
			<th width="1%"><?php echo JHtml::_('grid.checkall'); ?></th>
			<th width="5%"><?php echo JText::_('COM_JEREGISTER_FARM_NAME'); ?></th>
			<th width="5%"><?php echo JText::_('COM_JEREGISTER_ADDRESS'); ?></th>
			<th width="2%"><?php echo JText::_('COM_JEREGISTER_CITY'); ?></th>
			<th width="1%"><?php echo JText::_('COM_JEREGISTER_PROVINCE'); ?></th>
			<th width="2%"><?php echo JText::_('COM_JEREGISTER_POSTAL_CODE'); ?></th>
			<th width="5%">contact</th>
			<th width="3%">telephone</th>
			<th width="4%">email</th>
			<th width="5%">website</th>
			<th width="7%">acres</th>
			<th width="10%">other crops</th>
			<th width="10%">description</th>
			<th width="2%">latitude</th>
			<th width="2%">longitude</th>
			<th width="4%">facebook</th>
			<th width="6%">tags</th>
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
