<?php
defined('_JEXEC') or die('Restricted access');

/**
 * This is a file to add template specific chrome to pagination rendering.
 *
 * pagination_list_footer
 * 	Input variable $list is an array with poffsets:
 * 		$list[limit]		: int
 * 		$list[limitstart]	: int
 * 		$list[total]		: int
 * 		$list[limitfield]	: string
 * 		$list[pagescounter]	: string
 * 		$list[pageslinks]	: string
 *
 * pagination_list_render
 * 	Input variable $list is an array with poffsets:
 * 		$list[all]
 * 			[data]		: string
 * 			[active]	: boolean
 * 		$list[start]
 * 			[data]		: string
 * 			[active]	: boolean
 * 		$list[previous]
 * 			[data]		: string
 * 			[active]	: boolean
 * 		$list[next]
 * 			[data]		: string
 * 			[active]	: boolean
 * 		$list[end]
 * 			[data]		: string
 * 			[active]	: boolean
 * 		$list[pages]
 * 			[{PAGE}][data]		: string
 * 			[{PAGE}][active]	: boolean
 *
 * pagination_item_active
 * 	Input variable $item is an object with fields:
 * 		$item->base	: integer
 * 		$item->link	: string
 * 		$item->text	: string
 *
 * pagination_item_inactive
 * 	Input variable $item is an object with fields:
 * 		$item->base	: integer
 * 		$item->link	: string
 * 		$item->text	: string
 *
 * This gives template designers ultimate control over how pagination is rendered.
 *
 * NOTE: If you override pagination_item_active OR pagination_item_inactive you MUST override them both
 */

function pagination_list_footer($list)
{
	$html = "<del class=\"container\"><div class=\"pagination\">\n";

	$html .= "\n<div class=\"limit\">".JText::_('Display Num').$list['limitfield']."</div>";
	$html .= $list['pageslinks'];
	$html .= "\n<div class=\"limit\">".$list['pagescounter']."</div>";

	$html .= "\n<input type=\"hidden\" name=\"limitstart\" value=\"".$list['limitstart']."\" />";
	$html .= "\n</div></del>";

	return $html;
}

function pagination_list_render($list)
{
	$html = '';

	if ($list['start']['active'])
		$html .= '<div class="ui left attached red basic button pag_button pag_start"><i class="angle double left icon"></i>'.$list/*['start']*/['data'].'</div>';
	else
		$html .= '<div class="ui left attached red basic button pag_button pag_start poff"><i class="angle double left icon"></i>'.$list/*['start']*/['data'].'</div>';

	if ($list['previous']['active'])
		$html .= '<div class="ui right attached red basic button pag_button pag_previous"><i class="left angle icon"></i>'.$list['previous']['data'].'</div>';
	else
		$html .= '<div class="ui right attached red basic button pag_button pag_previous poff"><i class="left angle icon"></i>'.$list['previous']['data'].'</div>';

	$html .= '<div class="ui pagination menu pag_button plist">';
	foreach($list['pages'] as $page)
		$html .= $page['data'];
	$html .= '</div>';

	if ($list['next']['active'])
		$html .= '<div class="ui left attached red basic button pag_button pag_next">'.$list['next']['data'].'<i class="right angle icon"></i></div>';
	else
		$html .= '<div class="ui left attached red basic button pag_button pag_next poff">'.$list['next']['data'].'<i class="right angle icon"></i></div>';

	if ($list['end']['active'])
		$html .= '<div class="ui right attached red basic button pag_button pag_end">'.$list/*['end']*/['data'].'<i class="angle double right icon"></i></div>';
	else
		$html .= '<div class="ui right attached red basic button pag_button pag_end poff">'.$list/*['end']*/['data'].'<i class="angle double right icon"></i></div>';

	return $html;
}

function pagination_item_active(&$item)
{
	return '<a class="active item" href="'.$item->link.'">'.$item->text.'</a>';
}

function pagination_item_inactive(&$item)
{
	return "<span class='item'>".$item->text."</span>";
}
?>
