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
?>


<?php // The menu class is deprecated. Use nav instead. ?>
<div class="ui <?php echo $class_sfx; ?> menu"<?php
$tag = '';

if ($params->get('tag_id') != null) {
    $tag = $params->get('tag_id') . '';
    echo ' id="' . $tag . '"';
}
?>>
    <?php
    foreach ($list as $i => &$item) {
        $class = 'item ' . $item->id;

        if ($item->parent) {
            //$class = 'ui item dropdown';
            echo '<div class="ui dropdown link item" data-level="';
            echo($item->level_diff);
            echo'" >';
        }

        if (($item->id == $active_id) OR ($item->type == 'alias' AND $item->params->get('aliasoptions') == $active_id)) {
            $class .= ' current';
        }

        if (in_array($item->id, $path)) {
            $class .= ' active';
        } elseif ($item->type == 'alias') {
            $aliasToId = $item->params->get('aliasoptions');

            if (count($path) > 0 && $aliasToId == $path[count($path) - 1]) {
                $class .= ' active';
            } elseif (in_array($aliasToId, $path)) {
                $class .= ' alias-parent-active';
            }
        }

        if ($item->type == 'separator') {
            $class .= ' header';
        }

        if ($item->deeper) {
            $class .= ' deeper';
        }

        if (!empty($class)) {
            $class = ' class="' . trim($class) . '"';
        }


        // Render the menu item.
        switch ($item->type) :
            case 'separator':
            case 'url':
            case 'component':
            case 'heading':
                require JModuleHelper::getLayoutPath('mod_menu', 'dropdown_' . $item->type);
                break;

            default:
                require JModuleHelper::getLayoutPath('mod_menu', 'dropdown_url');
                break;
        endswitch;


        // The next item is deeper.
        if ($item->deeper) {
            echo '<div class="menu" data-level="';
            echo($item->level_diff);
            echo '">';
        } elseif ($item->shallower) {
            // The next item is shallower.
            echo '</div> <!--1-->';
            echo str_repeat('</div><!--2-->', $item->level_diff);
        } else {

            // The next item is on the same level.
            if ($item->parent) {
            //$class = 'ui item dropdown';
            echo '</div>';
        };
        }
    }
    ?>
</div>

