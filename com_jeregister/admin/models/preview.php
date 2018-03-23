<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterModelPreview extends JModelList
{
	public function getItems()
	{
		$filename = $this->getState("preview.filename");

		//csv to array
		$csv = array_map("str_getcsv", file(JUri::root() . "/uploads/$filename"));
		
		//get headers from first row
		array_walk($csv, function(&$a) use ($csv) {
			$a = array_combine($csv[0], $a);
		});

		//remove first row
		array_shift($csv);

		foreach ($csv as $i => $arr) {
			$csv[$i] = (object) $arr;
		}

		return $csv;
	}
}
