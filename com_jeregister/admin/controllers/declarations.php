<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterControllerDeclarations extends JControllerForm
{
	public function list($key = null, $urlVar = null)
	{
		$this->setRedirect(JRoute::_('index.php?option=com_jeregister&view=declarations', false));
	}

	public function export($key = null, $urlVar = null)
	{
		$model = $this->getModel("declarations");
		$items = $model->getItems();
		$keys = array_keys((array)reset($items));

		$date = date("Y_M_d");
		$filename = "declarations_$date.csv";

		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename="'.$filename.'";');

		$f = fopen("php://output", "w");

		fputcsv($f, $keys, ","); //header

		foreach ($items as $line) {
			fputcsv($f, (array) $line, ",");
		}

		die;
	}
}