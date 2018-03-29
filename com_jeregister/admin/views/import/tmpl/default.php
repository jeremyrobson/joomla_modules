<?php
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');
?>
<form action="<?php echo JRoute::_('index.php?option=com_jeregister&view=import'); ?>" enctype="multipart/form-data"
    method="post" name="adminForm" id="adminForm">

	<div class="form-horizontal">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_JEREGISTER_IMPORT_MEMBERS') ?></legend>
			<div class="row-fluid">
				<div class="span6">
					<?php echo $this->form->renderFieldset('import');  ?>
				</div>
			</div>
		</fieldset>
	</div>

	<div class="btn-toolbar">
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('registrations.upload')">
				<span class="icon-ok"></span><?php echo JText::_('COM_JEREGISTER_UPLOAD') ?>
			</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn" onclick="Joomla.submitbutton('registrations.cancel')">
				<span class="icon-cancel"></span><?php echo JText::_('JCANCEL') ?>
			</button>
		</div>
	</div>
    
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>
