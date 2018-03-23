<?php
defined('_JEXEC') or die('Restricted access');

class JeRegisterModelPreview extends JModelList
{
	public function getItems()
	{
		$filename = $this->getState("preview.filename");

		//csv to array
		$items = array_map("str_getcsv", file(JUri::root() . "/uploads/$filename"));
		
		//get headers from first row
		array_walk($items, function(&$a) use ($items) {
			$a = array_combine($items[0], $a);
		});

		//remove first row
		array_shift($items);

		foreach ($items as $index => $arr) {
			//convert to list of objects
			$items[$index] = (object) $arr;
                        
			//get lat long
			preg_match_all("/-?\d+\.\d+/", $arr["location"], $matches);
			if (!empty($matches[0])) {
	                        $items[$index]->latitude = floatval($matches[0][0]);
        	                $items[$index]->longitude = floatval($matches[0][1]);
			}
			else {
				$items[$index]->latitude = 0;
				$items[$index]->longitude = 0;
			}
			

			//get tags
                        $items[$index]->tags = strtolower($arr["tags"]);
		}

		return $items;
	}
}
