<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterModelImport extends JModelAdmin
{
	public function getForm($data = array(), $loadData = true)
	{
		$form = $this->loadForm(
			"com_jeregister.form",
			"import",
			array(
				"control" => "jform",
				"load_data" => $loadData
			)
		);
		
		if (empty($form))
		{
			$errors = $this->getErrors();
			throw new Exception(implode("\n", $errors), 500);
		}

		return $form;
	}
}
