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

/**
 * BookList Controller
 *
 * @package     Joomla.Administrator
 * @subpackage  com_booklist
 * @since       0.0.9
 */
class BookListControllerBookList extends JControllerForm
{
    protected $view_list = "BookListList"; //pressing cancel will return to this view
}