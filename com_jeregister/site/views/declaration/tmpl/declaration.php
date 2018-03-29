<?php
defined('_JEXEC') or die('Restricted access');
JHtml::_('behavior.formvalidator');

$form = JForm::getInstance("declaration", "components/com_jeregister/models/forms/declaration.xml");
?>
<form action="<?php echo JRoute::_('index.php?option=com_jeregister&view=declaration&layout=declaration'); ?>"
    method="post" name="adminForm" id="adminForm" class="form-validate">

	<div class="form-horizontal">
		<h1><?php echo JTEXT::_('COM_JEREGISTER_DECLARATION_DETAILS_LEGEND') ?></h1>
		<?php echo $this->form->renderFieldset("hidden");  ?>
		<?php foreach($form->getFieldsets("main") as $index => $fieldset): ?>
		<fieldset class="adminform">
			<legend><?php echo JText::_($fieldset->label) ?></legend>
			<div class="row-fluid">
				<div class="span6">
					<?php echo $this->form->renderFieldset($fieldset->name);  ?>
				</div>
			</div>
		</fieldset>
		<?php endforeach; ?>
	</div>
    
	<div class="btn-toolbar">
		<div class="btn-group">
			<button type="button" class="btn" onclick="Joomla.submitbutton('declaration.cancel')">
				<span class="icon-cancel"></span><?php echo JText::_('JCANCEL') ?>
			</button>
		</div>
		<div class="btn-group">
			<button type="button" class="btn btn-primary" onclick="Joomla.submitbutton('declaration.save')">
				<?php echo JText::_('JSAVE') ?>&nbsp;<span class="icon-arrow-right"></span>
			</button>
		</div>
	</div>

	<input type="hidden" name="task" />
	<?php echo JHtml::_('form.token'); ?>
</form>
