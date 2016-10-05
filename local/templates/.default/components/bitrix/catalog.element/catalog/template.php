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

<div class="result-wrapper">
    <div class="result-name-col clearfix">
        <div class="rn-col floatleft">Компания</div>
        <div class="rn-col floatleft">Ставка</div>
        <div class="rn-col floatleft">Сумма</div>
        <div class="rn-col floatleft">Срок</div>
        <div class="rn-col floatleft">Решение</div>
    </div>
    <div class="result-item clearfix">
        <div class="co-logo floatleft">
            <div class="img-logo">
                <img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" title="<?=$arResult['NAME']?>" alt="<?=$arResult['NAME']?>" />
            </div>
        </div>
        <div class="co-data-wr clearfix floatleft">
            <div class="co-data floatleft">
                <div class="mb-data-rn">Ставка</div>
                <div class="co-data-cond"><?=$arResult["PROPERTIES"]["RATE"]["VALUE"] ? $arResult["PROPERTIES"]["RATE"]["VALUE"].'%' : '-'?></div>
                <div class="co-data-name">в день</div>
            </div>
            <div class="co-data floatleft">
                <div class="mb-data-rn">Сумма</div>
                <div class="co-data-cond"><?=$arResult["PROPERTIES"]["SUM"]["VALUE"] ? $arResult["PROPERTIES"]["SUM"]["VALUE"] : '-'?></div>
                <div class="co-data-name">руб.</div>
            </div>
            <div class="co-data floatleft">
                <div class="mb-data-rn">Срок</div>
                <div class="co-data-cond"><?=$arResult["PROPERTIES"]["TIME"]["VALUE"] ? $arResult["PROPERTIES"]["TIME"]["VALUE"] : '-'?></div>
                <div class="co-data-name">дней</div>
            </div>
            <div class="co-data floatleft">
                <div class="mb-data-rn">Решение</div>
                <div class="co-data-cond">
                    <?=$arResult["PROPERTIES"]["SOLVE"]["VALUE"] ? $arResult["PROPERTIES"]["SOLVE"]["VALUE"] : '-'?>
                </div>
                <div class="co-data-name">минут</div>
            </div>
        </div>
        <noindex>
            <?if($arResult["PROPERTIES"]["LINK"]["VALUE"] <> ''){?>
                <div class="co-data mbt-btn floatleft">
                    <a rel="nofollow" target="_blank" href="<?=$arResult["PROPERTIES"]["LINK"]["VALUE"]?>" class="btn-site orange">Оформить</a>
                </div>
            <?}?>
        </noindex>
    </div>
</div>
<?if($arResult['DETAIL_TEXT']){?>
    <div class="content-text">
        <?=$arResult['DETAIL_TEXT']?>
    </div>
<?}?>
<noindex>
    <?if($arResult["PROPERTIES"]["LINK"]["VALUE"] <> ''){?>
        <div class="now-credit-wrapper clearfix">
            <div class="ncw-text floatleft">Оформите займ прямо сейчас!</div>
            <div class="ncw-btn floatright">
                <a rel="nofollow"    href="<?=$arResult["PROPERTIES"]["LINK"]["VALUE"]?>" class="btn-site orange">Оформить</a>
            </div>
        </div>
    <?}?>
</noindex>
