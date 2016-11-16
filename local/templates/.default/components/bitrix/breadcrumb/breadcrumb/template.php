<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

//delayed function must return a string
if(empty($arResult))
	return "";

$strReturn = '<div class="breadcrambs"><ul class="clearfix">';

$num_items = count($arResult);
for($index = 0, $itemSize = $num_items; $index < $itemSize; $index++)
{
	$title = htmlspecialcharsex($arResult[$index]["TITLE"]);

	if($arResult[$index]["LINK"] <> "" && $index != $itemSize-1)
	{
		$strReturn .= '<li><a href="'.$arResult[$index]["LINK"].'" title="'.$title.'">'.$title.'</a></li><li><i class="fa fa-angle-right" aria-hidden="true"></i></li>';
	}
	else
	{
		$strReturn .= '<li><span>'.$title.'</span></li>';
	}
}

$strReturn .= '</ul></div>';

return $strReturn;
?>
