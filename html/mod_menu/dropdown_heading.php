<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

$active = '';
$title = $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';


if ($item->menu_image)
{
	$item->params->get('menu_text', 1) ?
	$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" /><span class="image-title">' . $item->title . '</span> ' :
	$linktype = '<img src="' . $item->menu_image . '" alt="' . $item->title . '" />';
}
else
{
	$linktype = $item->title;
}

 if (in_array($item->id, $path))
          {
            $active .= ' active';
          }
          elseif ($item->type == 'alias')
          {
            $aliasToId = $item->params->get('aliasoptions');

            if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
            {
              $active .= ' active';
            }
            elseif (in_array($aliasToId, $path))
            {
              $active .= ' alias-parent-active';
            }
          }


?>
<div class="header item <?php echo $active; ?> <?php echo $item->anchor_css; ?>" <?php echo $title; ?>><?php echo $linktype; ?></div>
