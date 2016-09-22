<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(!$arResult["NavShowAlways"])
{
	if ($arResult["NavRecordCount"] == 0 || ($arResult["NavPageCount"] == 1 && $arResult["NavShowAll"] == false))
		return;
}
?>

<div class="paginator">
	<?
	$strNavQueryString = ($arResult["NavQueryString"] != "" ? $arResult["NavQueryString"]."&amp;" : "");
	$strNavQueryStringFull = ($arResult["NavQueryString"] != "" ? "?".$arResult["NavQueryString"] : "");

	if($arResult["bDescPageNumbering"] === true):
		$bFirst = true;
		if ($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
			if($arResult["bSavePage"]):
				?>
				 <a class="paginator__back" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
				<?
			else:
				if ($arResult["NavPageCount"] == ($arResult["NavPageNomer"]+1) ):
					?>
					 <a class="paginator__back" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
					<?
				else:
					?>
					 <a class="paginator__back" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
					<?
				endif;
			endif;

			if ($arResult["nStartPage"] < $arResult["NavPageCount"]):
				$bFirst = false;
				if($arResult["bSavePage"]):
					?>
					 <a class="paginator__page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>">1 </a>  
					<?
				else:
					?>
					 <a class="paginator__page-link" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1 </a>  
					<?
				endif;
				if ($arResult["nStartPage"] < ($arResult["NavPageCount"] - 1)):
					?>
					 <a class="paginator__page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=intVal($arResult["nStartPage"] + ($arResult["NavPageCount"] - $arResult["nStartPage"]) / 2)?>">... </a>  
					<?
				endif;
			endif;
		endif;
		do
		{
			$NavRecordGroupPrint = $arResult["NavPageCount"] - $arResult["nStartPage"] + 1;

			if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
				?>
				<span class="<?=($bFirst ? "paginator__page-link" : "paginator__page-link")?>"><?=$NavRecordGroupPrint?></span>
				<?
			elseif($arResult["nStartPage"] == $arResult["NavPageCount"] && $arResult["bSavePage"] == false):
				?>
				 <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "paginator__page-link" : "paginator__page-link")?>"><?=$NavRecordGroupPrint?> </a>  
				<?
			else:
				?>
				 <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
					?> class="<?=($bFirst ? "paginator__page-link" : "paginator__page-link")?>"><?=$NavRecordGroupPrint?> </a>  
				<?
			endif;

			$arResult["nStartPage"]--;
			$bFirst = false;
		} while($arResult["nStartPage"] >= $arResult["nEndPage"]);

		if ($arResult["NavPageNomer"] > 1):
			if ($arResult["nEndPage"] > 1):
				if ($arResult["nEndPage"] > 2):
					?>
					 <a class="paginator__page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] / 2)?>">... </a>  
					<?
				endif;
				?>
				 <a class="paginator__page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1"><?=$arResult["NavPageCount"]?> </a>  
				<?
			endif;
			?>
			 <a class="next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><i class="fa fa-angle-right" aria-hidden="true"></i></a>
			<?
		endif;

	else:
		$bFirst = true;

		if ($arResult["NavPageNomer"] > 1):
			if($arResult["bSavePage"]):
				?>
				 <a class="paginator__back" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
				<?
			else:
				if ($arResult["NavPageNomer"] > 2):
					?>
					 <a class="paginator__back" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]-1)?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
					<?
				else:
					?>
					 <a class="paginator__back" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>"><i class="fa fa-angle-left" aria-hidden="true"></i></a>
					<?
				endif;
			endif;

			if ($arResult["nStartPage"] > 1):
				$bFirst = false;
				if($arResult["bSavePage"]):
					?>
					 <a class="paginator__page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=1">1 </a>  
					<?
				else:
					?>
					 <a class="paginator__page-link" href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>">1 </a>  
					<?
				endif;
				if ($arResult["nStartPage"] > 2):
					?>
					 <a class="paginator__page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nStartPage"] / 2)?>">... </a>  
					<?
				endif;
			endif;
		endif;
		?>
			<?
			do
			{
				if ($arResult["nStartPage"] == $arResult["NavPageNomer"]):
					?>
					<a class="current-page"><?=$arResult["nStartPage"]?> </a>
					<?
				elseif($arResult["nStartPage"] == 1 && $arResult["bSavePage"] == false):
					?>
					 <a href="<?=$arResult["sUrlPath"]?><?=$strNavQueryStringFull?>" class="<?=($bFirst ? "paginator__page-link" : "paginator__page-link")?>"><?=$arResult["nStartPage"]?> </a>  
					<?
				else:
					?>
					 <a href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["nStartPage"]?>"<?
						?> class="<?=($bFirst ? "paginator__page-link" : "paginator__page-link")?>"><?=$arResult["nStartPage"]?> </a>  
					<?
				endif;
				$arResult["nStartPage"]++;
				$bFirst = false;
			} while($arResult["nStartPage"] <= $arResult["nEndPage"]);
			?>
		<?
		if($arResult["NavPageNomer"] < $arResult["NavPageCount"]):
			if ($arResult["nEndPage"] < $arResult["NavPageCount"]):
				if ($arResult["nEndPage"] < ($arResult["NavPageCount"] - 1)):
					?>
					 <a class="paginator__page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=round($arResult["nEndPage"] + ($arResult["NavPageCount"] - $arResult["nEndPage"]) / 2)?>">... </a>  
					<?
				endif;
				?>
				 <a class="paginator__page-link" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=$arResult["NavPageCount"]?>"><?=$arResult["NavPageCount"]?> </a>  
				<?
			endif;
			?>
			 <a class="next" href="<?=$arResult["sUrlPath"]?>?<?=$strNavQueryString?>PAGEN_<?=$arResult["NavNum"]?>=<?=($arResult["NavPageNomer"]+1)?>"><i class="fa fa-angle-right" aria-hidden="true"></i> </a>
			<?
		endif;
	endif;
	?>
</div>
