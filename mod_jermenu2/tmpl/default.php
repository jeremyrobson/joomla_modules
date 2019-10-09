<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2018 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$id = '';

if ($tagId = $params->get('tag_id', ''))
{
	$id = ' id="' . $tagId . '"';
}

?>

<nav class="jm-navbar">
    <button class="jm-navicon"></button>
    <div class="jm-collapse">
        <ul class="jm-nav jm-level-0">

<?php foreach ($list as $i => &$item)
{
	$class = "";

	if ($item->id == $default_id)
	{
		//$class .= ' default';
	}

	if ($item->id == $active_id || ($item->type === 'alias' && $item->params->get('aliasoptions') == $active_id))
	{
		//$class .= ' current';
	}

	if (in_array($item->id, $path))
	{
		//$class .= ' active';
	}

	if ($item->type === 'separator')
	{
		//$class .= ' divider';
	}

    $url = $item->flink;

	if ($item->deeper)
	{
        $class .= " deeper";
        $url = "#";
	}

	if ($item->parent)
	{
		//$class .= ' parent';
    }

	echo '<li class="jm-item' . $class . '">';

	echo '<a href="' . $url . '" class="jm-link">' . $item->title . '</a>';

	// The next item is deeper.
	if ($item->deeper)
	{
        echo "<ul class='jm-sub jm-level-{$item->level}'>";
	}
	// The next item is shallower.
	elseif ($item->shallower)
	{
		echo '</li>';
		echo str_repeat('</ul></li>', $item->level_diff);
	}
	// The next item is on the same level.
	else
	{
		echo '</li>';
	}
}
?>


    </ul>

	</div>

</nav>