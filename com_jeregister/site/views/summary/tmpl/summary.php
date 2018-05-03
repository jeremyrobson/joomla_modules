<?php
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');
?>

<form action="<?php echo JRoute::_('index.php?option=com_jeregister&view=summary&layout=summary'); ?>"
    method="post" name="adminForm" id="adminForm" class="form-validate">
	<input type="hidden" name="registration_id" value="<?php echo $this->form->getValue("id"); ?>" />

	<div class="form-horizontal">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_JEREGISTER_SUMMARY_DETAILS_LEGEND'); ?></legend>
			<div class="row-fluid">
				<div class="span6">
					<?php $data = $this->form->getValue("main"); ?>
					<h3><?php echo JText::_('COM_JEREGISTER_DECLARATION_APPLICANT_INFORMATION'); ?></h3>
					<table class="table">
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_PRODUCER_NAME'); ?></th>
							<td><?php echo $data->producer_name; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_CONTACT_NAME'); ?></th>
							<td><?php echo $data->contact_name; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_ADDRESS'); ?></th>
							<td><?php echo $data->address; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_CITY'); ?></th>
							<td><?php echo $data->city; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_PROVINCE'); ?></th>
							<td><?php echo $data->province; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_POSTAL_CODE'); ?></th>
							<td><?php echo $data->postal_code; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_TELEPHONE'); ?></th>
							<td><?php echo $data->telephone; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_FAX'); ?></th>
							<td><?php echo $data->fax; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_CELL'); ?></th>
							<td><?php echo $data->cell; ?></td>
						</tr>
					</table>
					
					<h3><?php echo JText::_('COM_JEREGISTER_DECLARATION_BLUEBERRY_ACREAGE'); ?></h3>
					<table class="table">
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_BLUEBERRY_BEARING_ACRES'); ?></th>
							<td><?php echo $data->blueberry_bearing_acres; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_BLUEBERRY_NON_BEARING_ACRES'); ?></th>
							<td><?php echo $data->blueberry_non_bearing_acres; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_BLUEBERRY_LOCATION'); ?></th>
							<td><?php echo $data->blueberry_location; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_BLUEBERRY_FARM_NAME'); ?></th>
							<td><?php echo $data->blueberry_farm_name; ?></td>
						</tr>
					</table>
					
					<h3><?php echo JText::_('COM_JEREGISTER_DECLARATION_RASPBERRY_ACREAGE'); ?></h3>
					<table class="table">
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_SUMMER_RASPBERRY_BEARING_ACRES'); ?></th>
							<td><?php echo $data->summer_raspberry_bearing_acres; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_SUMMER_RASPBERRY_NON_BEARING_ACRES'); ?></th>
							<td><?php echo $data->summer_raspberry_non_bearing_acres; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_FALL_RASPBERRY_BEARING_ACRES'); ?></th>
							<td><?php echo $data->fall_raspberry_bearing_acres; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_FALL_RASPBERRY_NON_BEARING_ACRES'); ?></th>
							<td><?php echo $data->fall_raspberry_non_bearing_acres; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_RASPBERRY_LOCATION'); ?></th>
							<td><?php echo $data->raspberry_location; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_RASPBERRY_FARM_NAME'); ?></th>
							<td><?php echo $data->raspberry_farm_name; ?></td>
						</tr>
					</table>

					<h3><?php echo JText::_('COM_JEREGISTER_DECLARATION_STRAWBERRY_ACREAGE'); ?></h3>
					<table class="table">
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_JUNE_STRAWBERRY_BEARING_ACRES'); ?></th>
							<td><?php echo $data->june_strawberry_bearing_acres; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_JUNE_STRAWBERRY_NON_BEARING_ACRES'); ?></th>
							<td><?php echo $data->june_strawberry_non_bearing_acres; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_DAY_NEUTRAL_STRAWBERRY'); ?></th>
							<td><?php echo $data->day_neutral_strawberry_bearing_acres; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_STRAWBERRY_LOCATION'); ?></th>
							<td><?php echo $data->strawberry_location; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_STRAWBERRY_FARM_NAME'); ?></th>
							<td><?php echo $data->strawberry_farm_name; ?></td>
						</tr>
					</table>

					<h3><?php echo JText::_('COM_JEREGISTER_DECLARATION_SIGNATURES'); ?></h3>
					<table class="table">
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_SIGNATURE'); ?></th>
							<td><?php echo $data->signature; ?></td>
						</tr>
						<tr>
							<th><?php echo JText::_('COM_JEREGISTER_DECLARATION_SIGNATURE_DATE'); ?></th>
							<td><?php echo $data->signature_date; ?></td>
						</tr>
					</table>
				</div>
			</div>
		</fieldset>
	</div>
    
	<div class="btn-toolbar">
		<div class="btn-group">
			<button type="button" class="btn" onclick="Joomla.submitbutton('summary.back')">
				<span class="icon-arrow-left"></span>
				<?php echo JText::_('COM_JEREGISTER_DECLARATION_BACK') ?>
			</button>
		</div>
		
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('summary.next')">
				<?php echo JText::_('COM_JEREGISTER_DECLARATION_NEXT') ?>&nbsp;
				<span class="icon-arrow-right"></span>
			</button>
		</div>
	</div>

	<input type="hidden" name="task" />
	<?php echo JHtml::_('form.token'); ?>
</form>
