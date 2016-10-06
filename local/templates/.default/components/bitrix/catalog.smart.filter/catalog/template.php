<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="bx_filter range-wrapper clearfix">
	<form name="<?echo $arResult["FILTER_NAME"]."_form"?>" action="<?echo $arResult["FORM_ACTION"]?>" method="get" class="smartfilter">
		<?foreach($arResult["HIDDEN"] as $arItem):?>
			<input type="hidden" name="<?echo $arItem["CONTROL_NAME"]?>" id="<?echo $arItem["CONTROL_ID"]?>" value="<?echo $arItem["HTML_VALUE"]?>" />
		<?endforeach;
		//not prices
		$index = 1;
		foreach($arResult["ITEMS"] as $key=>$arItem)
		{
			?>
			<div class="bx_filter_parameters_box <?if ($arItem["DISPLAY_EXPANDED"]== "Y"):?>active<?endif?>">
				<span class="bx_filter_container_modef"></span>
				<div class="bx_filter_block">
					<?
					$arCur = current($arItem["VALUES"]);
					switch ($arItem["DISPLAY_TYPE"])
					{
						case "B"://NUMBERS
						?>
						<div class="re-block floatleft">
							<div class="re-col" for="range-data<?=$index?>">
								<span><?=$arItem["NAME"]?>:</span>
								<input
									class="range-data<?=$index?>"
									type="text"
									name="<?echo $arItem["VALUES"]["MIN"]["CONTROL_NAME"]?>"
									id="<?echo $arItem["VALUES"]["MIN"]["CONTROL_ID"]?>"
									value="<?echo $arItem["VALUES"]["MIN"]["HTML_VALUE"]?>"
									data-min-start="<?echo $arItem["VALUES"]["MIN"]["VALUE"]?>"
									size="5"
									onkeyup="smartFilter.keyup(this)"
								/>
								<input
									style="display: none"
									type="text"
									name="<?echo $arItem["VALUES"]["MAX"]["CONTROL_NAME"]?>"
									id="<?echo $arItem["VALUES"]["MAX"]["CONTROL_ID"]?>"
									value="<?echo $arItem["VALUES"]["MAX"]["HTML_VALUE"]?>"
									data-max-start="<?echo $arItem["VALUES"]["MAX"]["VALUE"]?>"
									size="5"
									onkeyup="smartFilter.keyup(this)"
								/>
								<span><?if($arItem['CODE'] == 'SUM'){?>руб.<?} elseif($arItem['CODE'] == 'TIME') {?>дней<?}?></span>
							</div>
							<div class="range" id="range<?=$index?>"></div>
						</div>
						<?
					break;
					case "P"://DROPDOWN
					$checkedItemExist = false;
					?>
						<div class="bx_filter_select_container re-block-select floatleft">
							<div class="bx_filter_select_block" onclick="smartFilter.showDropDownPopup(this, '<?=CUtil::JSEscape($key)?>')">
								<div class="bx_filter_select_text " data-role="currentOption">
									<?
									foreach ($arItem["VALUES"] as $val => $ar)
									{
										if ($ar["CHECKED"])
										{
											echo $ar["VALUE"];
											$checkedItemExist = true;
										}
									}
									if (!$checkedItemExist)
									{
										echo '(все)';
									}
									?>
								</div>
								<div class="bx_filter_select_arrow"></div>
								<input
									style="display: none"
									type="radio"
									name="<?=$arCur["CONTROL_NAME_ALT"]?>"
									id="<? echo "all_".$arCur["CONTROL_ID"] ?>"
									value=""
								/>
								<?foreach ($arItem["VALUES"] as $val => $ar):?>
									<input
										style="display: none"
										type="radio"
										name="<?=$ar["CONTROL_NAME_ALT"]?>"
										id="<?=$ar["CONTROL_ID"]?>"
										value="<? echo $ar["HTML_VALUE_ALT"] ?>"
										<? echo $ar["CHECKED"]? 'checked="checked"': '' ?>
									/>
								<?endforeach?>
								<div class="bx_filter_select_popup" data-role="dropdownContent" style="display: none;">
									<ul>
										<li>
											<label for="<?="all_".$arCur["CONTROL_ID"]?>" class="bx_filter_param_label" data-role="label_<?="all_".$arCur["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape("all_".$arCur["CONTROL_ID"])?>')">
												<? echo GetMessage("CT_BCSF_FILTER_ALL"); ?>
											</label>
										</li>
										<?
										foreach ($arItem["VALUES"] as $val => $ar):
											$class = "";
											if ($ar["CHECKED"])
												$class.= " selected";
											if ($ar["DISABLED"])
												$class.= " disabled";
											?>
											<li>
												<label for="<?=$ar["CONTROL_ID"]?>" class="bx_filter_param_label<?=$class?>" data-role="label_<?=$ar["CONTROL_ID"]?>" onclick="smartFilter.selectDropDownItem(this, '<?=CUtil::JSEscape($ar["CONTROL_ID"])?>')"><?=$ar["VALUE"]?></label>
											</li>
										<?endforeach?>
									</ul>
								</div>
							</div>
						</div>
					<?
					break;
					}
					?>
				</div>
			</div>
			<?
			$index++;
		}
		?>
		<div class="bx_filter_block">
			<div class="re-block btn-reblock floatleft">
				<input class="btn-site grey" type="submit" id="set_filter" name="set_filter" value="Показать" />
			</div>
		</div>
	</form>

</div>
<script>
	var smartFilter = new JCSmartFilter('<?echo CUtil::JSEscape($arResult["FORM_ACTION"])?>', 'horizontal');
</script>
