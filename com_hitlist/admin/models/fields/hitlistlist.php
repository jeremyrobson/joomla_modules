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

JFormHelper::loadFieldClass('list');

/**
 * HitList Form Field class for the HitList component
 *
 * @since  0.0.1
 */
class JFormFieldHitListList extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var string
	 */
	protected $type = 'HitListList';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	 /*
	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('id, title, catid, hits');
		$query->from('#__content');
		if (isset($this->catid)) {
			$query->where("id=".$this->catid);
		}
		$db->setQuery((string) $query);
		$articles = $db->loadObjectList();
		$options  = array();

		if ($articles)
		{
			foreach ($articles as $article)
			{
				$options[] = JHtml::_('select.option', $article->id, $article->title);
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
	*/
}