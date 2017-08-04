<?php
/**
 * @package     Joomla.Site
 * @subpackage  com_booklist
 *
 * @copyright   Copyright (C) 2005 - 2017 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

/**
 * Routing class from com_booklist
 *
 * @since  3.3
 */
class BookListRouter extends JComponentRouterBase
{
    public function build(&$query)
    {
        $segments = array();
        if (isset($query['id']))
        {
            $id = explode(':', $query['id']);
            $segments[] = $id[1];
            unset($query['id']);
        }
        unset($query['view']);

        echo "<pre>build"; print_r($segments); echo "</pre>";

        return $segments;
    }

    function parse(&$segments)
    {
        $vars = array();
        $app = JFactory::getApplication();
        $menu = $app->getMenu();
        $item = $menu->getActive();

        echo "<pre>build"; print_r($item->query); echo "</pre>";

        switch ($item->query['view']) {
            case 'list':
                $vars['view'] = 'item';

                $db = JFactory::getDbo();
                $query = $db->getQuery(true);
                $query->select('id');
                $query->from($db->quoteName('#__content'));
                $query->where($db->quoteName('alias')." = ".$db->quote($segments[0]));

                $db->setQuery($query);
                $result = $db->loadResult();

                $vars['id'] = (int) $result;
                break;
        }

        return $vars;
    }
}

/**
 * Booklist router functions
 *
 * These functions are proxys for the new router interface
 * for old SEF extensions.
 *
 * @param   array  &$query  An array of URL arguments
 *
 * @return  array  The URL arguments to use to assemble the subsequent URL.
 *
 * @deprecated  4.0  Use Class based routers instead
 */
function booklistBuildRoute(&$query)
{
    $router = new BookListRouter;

    return $router->build($query);
}

/**
 * BookList router functions
 *
 * These functions are proxys for the new router interface
 * for old SEF extensions.
 *
 * @param   array  $segments  The segments of the URL to parse.
 *
 * @return  array  The URL attributes to be used by the application.
 *
 * @deprecated  4.0  Use Class based routers instead
 */
function booklistParseRoute($segments)
{
    $router = new BookListRouter;

    return $router->parse($segments);
}