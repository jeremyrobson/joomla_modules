<?php

defined('_JEXEC') or die('Restricted access');

class JeRegisterController extends JControllerLegacy
{
	protected $default_view = 'profiles';

	public function import_articles($key = null)
	{/*
		$option = array();
		$option['driver']   = 'mysql';
		$option['host']     = '192.168.1.19';
		$option['user']     = 'root';
		$option['password'] = 'Proko123!';
		$option['database'] = 'temp';
		$option['prefix']   = ''; 
		$db = JDatabaseDriver::getInstance($option);

		$query = $db->getQuery(true);
		$query->select("*");
		$query->from("recipes");
		$db->setQuery((string) $query);
		
		$recipes = $db->loadObjectList();
*/

		//this code converts excel csv to array
		$csvData = file_get_contents(JPATH_ROOT . "/tmp/recipes2.csv");
		$csvData = str_replace("\r", "", $csvData);

		$first_line = strtok($csvData, "\n");
		$headers = explode(",", $first_line);
		$data = array();
		$row = array();
		$buffer = "";
		$enclosure = false;
		$h = 0;
		for ($i=0; $i<strlen($csvData); $i++) {
			$char = $csvData[$i];
			if ($char == "," && $enclosure == false) {
				$row[$headers[$h]] = $buffer;
				$buffer = "";
				$h++;
			}
			else if ($char == "\"" && $enclosure == false) {
				$enclosure = true;
			}
			else if ($char == "\"" && $enclosure == true) {
				$enclosure = false;
			}
			else if ($char == "\n" && $enclosure == false) {
				$row[$headers[$h]] = $buffer;
				$buffer = "";
				$data[] = $row;
				$row = array();
				$h = 0;
			}
			else {
				$buffer .= $char;
			}
		}

		array_shift($data); //begone header!
		echo "<Pre>"; print_r($data); die;

		$basePath = JPATH_ADMINISTRATOR.'/components/com_content';
		require_once $basePath.'/models/article.php';

		foreach ($recipes as $index => $recipe) {
			if ($recipe->id > -1) {
				$ingredients = "<h3>Ingredients</h3>" . $recipe->ingredients;
				$directions = "<h3>Directions</h3>" . $recipe->directions;
				$serves = "<h3>Serves</h3>" . $recipe->serves;

				$article_data = array(
					'id' => 0,
					'catid' => 71,
					'title' => $recipe->name,
					'alias' => preg_replace("/\s/", "_", strtolower($recipe->name)),
					'introtext' => '',
					'fulltext' => $ingredients . "<br>" . $directions . "<br>" . $serves,
					'state' => 1,
					'language' => '*',
					'access' => 1,
					'metadata' => json_encode(array('author' => '', 'robots' => '')),
					'images' => '{"image_intro":"' . $recipe->image . '","float_intro":"","image_intro_alt":"","image_intro_caption":"","image_fulltext":"' . $recipe->image . '","float_fulltext":"","image_fulltext_alt":"","image_fulltext_caption":""}',
					'rules' => array(
						'core.edit.delete' => array(),
						'core.edit.edit' => array(),
						'core.edit.state' => array(),
					),
					'tags' => array("2", "3", "4")
				);

				$article_model = JModelLegacy::getInstance('Article','ContentModel');
				if (!$article_model->save($article_data)) {
					$err_msg = $article_model->getError();
					echo $err_msg; die;
				}
			}
		}
	}

}
