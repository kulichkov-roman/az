<?
/**
 * Получить получить ссылки смотреть также для каталога
 */
$environment = \YT\Environment\EnvironmentManager::getInstance();

$curDir = $APPLICATION->GetCurDir();
$arSort = array(
    'SORT'=>'ASC'
);
$arSelect = array(
    'ID',
    'NAME',
    'PROPERTY_LINK'
);
$arFilter = array(
    'IBLOCK_ID' => $environment->get('catalogSeeAlsoIBlockId'),
    'NAME' => $curDir
);

$rsElements = CIBlockElement::GetList(
    $arSort,
    $arFilter,
    false,
    false,
    $arSelect
);

if ($arItem = $rsElements->Fetch())
{
    if(!empty($arItem['PROPERTY_LINK_VALUE']))
    {
        ?>
        <div class="navigation-link">
            <div class="nl-title">Смотрите также</div>
            <ul>
                <?foreach($arItem['PROPERTY_LINK_VALUE'] as $key => $value){?>
                    <li>
                        <i class="fa fa-angle-right" aria-hidden="true"></i> <a target="_blank" href="<?=$arItem['PROPERTY_LINK_DESCRIPTION'][$key]?>"><?=$value?></a>
                    </li>
                <?}?>
            </ul>
        </div>
        <br>
        <br>
        <br>
        <?
    }
}
?>
