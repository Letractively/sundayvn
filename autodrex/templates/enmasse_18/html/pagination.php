<?php
// no direct access
defined('_JEXEC') or die;

/**
 * This is a file to add template specific chrome to pagination rendering.
 *
 * pagination_list_footer
 *	Input variable $list is an array with offsets:
 *		$list[prefix]		: string
 *		$list[limit]		: int
 *		$list[limitstart]	: int
 *		$list[total]		: int
 *		$list[limitfield]	: string
 *		$list[pagescounter]	: string
 *		$list[pageslinks]	: string
 *
 * pagination_list_render
 *	Input variable $list is an array with offsets:
 *		$list[all]
 *			[data]		: string
 *			[active]	: boolean
 *		$list[start]
 *			[data]		: string
 *			[active]	: boolean
 *		$list[previous]
 *			[data]		: string
 *			[active]	: boolean
 *		$list[next]
 *			[data]		: string
 *			[active]	: boolean
 *		$list[end]
 *			[data]		: string
 *			[active]	: boolean
 *		$list[pages]
 *			[{PAGE}][data]		: string
 *			[{PAGE}][active]	: boolean
 *
 * pagination_item_active
 *	Input variable $item is an object with fields:
 *		$item->base	: integer
 *		$item->prefix	: string
 *		$item->link	: string
 *		$item->text	: string
 *
 * pagination_item_inactive
 *	Input variable $item is an object with fields:
 *		$item->base	: integer
 *		$item->prefix	: string
 *		$item->link	: string
 *		$item->text	: string
 *
 * This gives template designers ultimate control over how pagination is rendered.
 *
 * NOTE: If you override pagination_item_active OR pagination_item_inactive you MUST override them both
 */

function pagination_list_footer($list)
{
	$html = "<div class=\"list-footer\">\n";

	$html .= "\n<div class=\"limit\">".JText::_('JGLOBAL_DISPLAY_NUM').$list['limitfield']."</div>";
	$html .= $list['pageslinks'];
	$html .= "\n<div class=\"counter\">".$list['pagescounter']."</div>";

	$html .= "\n<input type=\"hidden\" name=\"" . $list['prefix'] . "limitstart\" value=\"".$list['limitstart']."\" />";
	$html .= "\n</div>";

	return $html;
}

function pagination_list_render($list)
{
	// Reverse output rendering for right-to-left display.
	$startClass = $list['start']['active']? "" : "noData";
	$endClass = $list['end']['active']? "" : "noData";
	$html = '<ul>';
	$html .= "<li class=\"pagination-start $startClass\">".$list['start']['data'].'</li>';
	$html .= "<li class=\"pagination-prev $startClass\">".$list['previous']['data'].'</li>';
	foreach($list['pages'] as $page) {
		if(!$page['active'])
			$html .= '<li class="active">'.$page['data'].'</li>';
		else
			$html .= '<li>'.$page['data'].'</li>';
	}
	$html .= "<li class=\"pagination-next $endClass\">". $list['next']['data'].'</li>';
	$html .= "<li class=\"pagination-end $endClass\">". $list['end']['data'].'</li>';
	$html .= '</ul>';

	return $html;
}

function pagination_item_active(&$item)
{
	return "<a title=\"".$item->text."\" href=\"".$item->link."\" class=\"pagenav\">".$item->text."</a>";
}

function pagination_item_inactive(&$item)
{
	return "<span class=\"pagenav\">".$item->text."</span>";
}
?>
