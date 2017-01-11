<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_search
 *
 * @copyright   Copyright (C) 2005 - 2015 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

// Including fallback code for the placeholder attribute in the search field.
JHtml::_('jquery.framework');
JHtml::_('script', 'system/html5fallback.js', false, true);

if ($width)
{
	$moduleclass_sfx .= ' ' . 'mod_search' . $module->id;
	$css = 'div.mod_search' . $module->id . ' input[type="search"]{ width:auto; }';
	JFactory::getDocument()->addStyleDeclaration($css);
	$width = ' size="' . $width . '"';
}
else
{
	$width = '';
}
?>
<div class="ui middle aligned search <?php echo $moduleclass_sfx ?>">
	<form action="<?php echo JRoute::_('index.php');?>" method="post" class="">
		<?php
			$output = '<label for="mod-search-searchword" class="element-invisible">' . $label . '</label> ';
			$output .= '<div class="ui action fluid input"><input name="searchword" id="mod-search-searchword" maxlength="' . $maxlength . '"  class="prompt search-query" type="text"' . $width;
			$output .= ' placeholder="' . $text . '" />';

			if ($button) :
				if ($imagebutton) :
					$btn_output = ' <button class="ui green icon button"> <i class="search icon" onclick="this.form.searchword.focus();"></i></button></div>';
				else :
					$btn_output = ' <button class="ui green button" onclick="this.form.searchword.focus();">' . $button_text . '</button></div>';
				endif;

				switch ($button_pos) :
					case 'top' :
						$output = $btn_output . '<br />' . $output;
						break;

					case 'bottom' :
						$output .= '<br />' . $btn_output;
						break;

					case 'right' :
						$output .= $btn_output;
						break;

					case 'left' :
					default :
						$output = $btn_output . $output;
						break;
				endswitch;

			endif;

			echo $output;
		?>
		<input type="hidden" name="task" value="search" />
		<input type="hidden" name="option" value="com_search" />
		<input type="hidden" name="Itemid" value="<?php echo $mitemid; ?>" />
	</form>
</div>
