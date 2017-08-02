<?php
/**
 * @package     Joomla.Administrator
 * @subpackage  com_booklist
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

// No direct access to this file
defined('_JEXEC') or die('Restricted access');

/**
 * BookList Model
 *
 * @since  0.0.1
 */
class BookListModelBookList extends JModelItem
{
	/**
	 * @var array books
	 */
	protected $books;

	/**
	 * Method to get a table object, load it if necessary.
	 *
	 * @param   string  $type    The table name. Optional.
	 * @param   string  $prefix  The class prefix. Optional.
	 * @param   array   $config  Configuration array for model. Optional.
	 *
	 * @return  JTable  A JTable object
	 *
	 * @since   1.6
	 */
	public function getTable($type = 'BookList', $prefix = 'BookListTable', $config = array())
	{
		return JTable::getInstance($type, $prefix, $config);
	}

    /**
    * Get the book
    *
    * @param integer $id
    *
    * @return book
    */
    public function getBook($id = 1)
    {
        if (!is_array($this->books))
        {
            $this->books = array();
        }

        if (!isset($this->messages[$id]))
        {
            $jinput = JFactory::getApplication()->input;
            $id     = $jinput->get('id', 1, 'INT');

            // Get a TableBookList instance
            $table = $this->getTable();

            // Load the book
            $table->load($id);

            // Assign the message
            $this->books[$id] = $table->book;
        }

        return $this->books[$id];
    }
}