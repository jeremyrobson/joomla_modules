<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_booklist
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

JFormHelper::loadFieldClass('list');

/**
 * BookList Form Field class for the BookList component
 *
 * @since  0.0.1
 */
class JFormFieldBookList extends JFormFieldList
{
	/**
	 * The field type.
	 *
	 * @var string
	 */
	protected $type = 'BookList';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return  array  An array of JHtml options.
	 */
	protected function getOptions()
	{
		$db    = JFactory::getDBO();
		$query = $db->getQuery(true);
		$query->select('
			#__booklist.id,
			#__booklist.cover_image,
			#__booklist.content_id,
			#__booklist.title,
			#__booklist.edition,
			#__booklist.publish_year,
			#__booklist.authors,
			#__booklist.published
		');
		$query->from('#__booklist');
		$query->leftJoin('#__content on content_id=#__content.id');
		$db->setQuery((string) $query);
		$books = $db->loadObjectList();
		$options  = array();

		if ($books)
		{
			foreach ($books as $book)
			{
				$options[] = JHtml::_('select.option', $book->id, $book->title);
			}
		}

		$options = array_merge(parent::getOptions(), $options);

		return $options;
	}
}