<?php
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');

?>
<form action="<?php echo JRoute::_('index.php?option=com_jeregister&view=form&layout=edit'); ?>"
    method="post" name="adminForm" id="adminForm" class="fore-validate">

	<div class="form-horizontal">
		<fieldset class="adminform">
			<legend><?php echo JText::_('COM_JEREGISTER_PROFILE_EDIT') ?></legend>
			<div class="row-fluid">
				<div class="span6">
					<?php echo $this->form->renderFieldset('details');  ?>
				</div>
			</div>
		</fieldset>
	</div>
    
	<div class="btn-toolbar">
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('profile.save')">
				<span class="icon-ok"></span><?php echo JText::_('JSAVE') ?>
			</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn" onclick="Joomla.submitbutton('profile.cancel')">
				<span class="icon-cancel"></span><?php echo JText::_('JCANCEL') ?>
			</button>
		</div>
	</div>

	<input type="hidden" name="task" />
	<?php echo JHtml::_('form.token'); ?>
</form>
