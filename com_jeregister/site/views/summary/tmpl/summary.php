<?php
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');
?>

<form action="<?php echo JRoute::_('index.php?option=com_jeregister&view=summary&layout=summary'); ?>"
    method="post" name="adminForm" id="adminForm" class="form-validate">
	<input type="hidden" name="registration_id" value="<?php echo $this->form->getValue("id"); ?>" />

	<div class="form-horizontal">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_JEREGISTER_SUMMARY_DETAILS_LEGEND') ?></legend>
			<div class="row-fluid">
				<div class="span6">
					<?php $data = $this->form->getValue("main"); ?>
					<p>Producer Name:				<?php echo $data->producer_name; ?></p>
					<p>Contact Name:				<?php echo $data->contact_name; ?></p>
					<p>Blueberry Bearing Acres:		<?php echo $data->blueberry_bearing_acres; ?></p>
				</div>
			</div>
		</fieldset>
	</div>
    
	<div class="btn-toolbar">
    <div class="btn-group">
			<button type="button" class="btn" onclick="Joomla.submitbutton('summary.back')">
				<span class="icon-arrow-left"></span><?php echo JText::_('COM_JEREGISTER_BACK') ?>
			</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('summary.next')">
				<?php echo JText::_('COM_JEREGISTER_NEXT') ?>&nbsp;<span class="icon-arrow-right"></span>
			</button>
		</div>
	</div>

	<input type="hidden" name="task" />
	<?php echo JHtml::_('form.token'); ?>
</form>