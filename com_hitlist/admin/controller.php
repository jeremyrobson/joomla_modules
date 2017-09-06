<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_hitlist
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * General Controller of HitList component
 *
 * @package     Joomla.Administrator
 * @subpackage  com_hitlist
 * @since       0.0.1
 */
class HitListController extends JControllerLegacy
{
	/**
	 * The default view for the display method.
	 *
	 * @var string
	 * @since 12.2
	 */
	protected $default_view = 'hitlistlist';

	public function downloadCSV() {
		$jform = JFactory::getApplication()->input->post->get('jform', array(), 'array');
		$catid = $jform["hidden_catid"];

		$items = array();
		$headers = new stdClass();
		$headers->index = "Row Num";
		$headers->title = "Title";
		$headers->hits = "Hits";
		$items[] = $headers;

		$db = JFactory::getDbo();
		$query = $db->getQuery(true);
		$query->select('title, hits');
		$query->from($db->quoteName('#__content'));
		if (!empty($catid)) {
			$query->where("catid=" . $catid);
		}
		$items = array_merge($items, $db->setQuery($query)->loadObjectList());

		$filename = "hits.csv";
		$delimiter = ",";
		$f = fopen('php://memory', 'w');
		foreach ($items as $index => $item) {
			if (isset($item->index)) {
				$index = $item->index;
			}
			$line = array($index, $item->title, $item->hits);
			fputcsv($f, $line, $delimiter);
		}
		fseek($f, 0);
		header('Content-Type: application/csv');
		header('Content-Disposition: attachment; filename="'.$filename.'";');
		fpassthru($f);
		fclose($f);

		JFactory::getApplication()->enqueueMessage(JText::_('CSV Downloaded'), 'success');
		//JRequest::setVar('task', ''); //this doesn't seem to work so javascript was added to tmpl\default.php
		jexit();
		
		$this->display();
	}
}