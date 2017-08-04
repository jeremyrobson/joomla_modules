<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_booklist
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */
// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * BookListList Model
 *
 * @since  0.0.1
 */
class BookListModelBookListList extends JModelList
{
    /**
     * Method to build an SQL query to load the list data.
     *
     * @return      string  An SQL query
     */
    protected function getListQuery()
    {
        // Initialize variables.
        $db    = JFactory::getDbo();
        $query = $db->getQuery(true);

        // Create the base select statement.
        $query->select('
			#__booklist.id,
			#__booklist.cover_image,
			#__booklist.content_id,
			#__booklist.title AS booklist_title,
			#__booklist.edition,
			#__booklist.publish_year,
			#__booklist.authors,
			#__booklist.published,
			#__content.title AS article_title
        ')
        ->from($db->quoteName('#__booklist'))
        ->leftJoin('#__content on content_id=#__content.id');

        return $query;
    }
}