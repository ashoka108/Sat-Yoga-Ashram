<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_menu
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Note. It is important to remove spaces between elements.
$class = $item->anchor_css ? $item->anchor_css . ' item' : ' item';
$title = $item->anchor_title ? 'title="' . $item->anchor_title . '" ' : '';
if ($item->parent)
{
    $class = ' item parent';
}

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
    $class .= ' active';
  }

  elseif ($item->type == 'alias')
  {
    $aliasToId = $item->params->get('aliasoptions');

    if (count($path) > 0 && $aliasToId == $path[count($path) - 1])
    {
      $class .= ' active';
    }
    elseif (in_array($aliasToId, $path))
    {
      $class .= ' alias-parent-active';
    }
  }



switch ($item->browserNav)
{
	default:
	case 0:
?>

<a class="alone<?php echo $class; ?>" href="<?php echo $item->flink; ?>" <?php echo $title; ?>><?php echo $linktype; ?></a>
<?php
		break;
	case 1:
		// _blank
?><a class="<?php echo $class; ?>" href="<?php echo $item->flink; ?>" target="_blank" <?php echo $title; ?>><?php echo $linktype; ?></a><?php
		break;
	case 2:
	// Use JavaScript "window.open"
?><a class="<?php echo $class; ?>" href="<?php echo $item->flink; ?>" onclick="window.open(this.href,'targetWindow','toolbar=no,location=no,status=no,menubar=no,scrollbars=yes,resizable=yes');return false;" <?php echo $title; ?>><?php echo $linktype; ?></a>
<?php
		break;
}
