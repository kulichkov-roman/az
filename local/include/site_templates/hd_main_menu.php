<?
$APPLICATION->IncludeComponent(
    "bitrix:menu",
    "top",
    Array(
        "ROOT_MENU_TYPE"           => "top",     // Тип меню для первого уровня
        "MAX_LEVEL"                => "1",        // Уровень вложенности меню
        "USE_EXT"                  => "Y",        // Подключать файлы с именами вида .тип_меню.menu_ext.php
        "DELAY"                    => "N",        // Откладывать выполнение шаблона меню
        "ALLOW_MULTI_SELECT"       => "N",        // Разрешить несколько активных пунктов одновременно
        "MENU_CACHE_TYPE"          => "N",        // Тип кеширования
        "MENU_CACHE_TIME"          => "3600",     // Время кеширования (сек.)
        "MENU_CACHE_USE_GROUPS"    => "Y",        // Учитывать права доступа
        "MENU_CACHE_GET_VARS"      => "",         // Значимые переменные запроса
    )
);
?>
