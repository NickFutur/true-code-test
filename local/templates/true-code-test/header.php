<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
$curPage = $APPLICATION->GetCurPage(false); ?>
<!-- Служебный код, необходим для защиты подключения этого файла без подключения ядра -->
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <?
        use Bitrix\Main\Page\Asset;
        $APPLICATION->ShowHead();
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/scss/reset.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/scss/swiper-bundle.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/scss/style.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/scss/media.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/scss/styles.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/template_style.css");
        ?>
    <title>
        <?$APPLICATION->ShowTitle()?>
    </title>
</head>

<body class="main-page main-page_background_color">
    <? $APPLICATION->ShowPanel(); ?>
    <!-- Отображение административной панели внизу страницы -->

    <!-- Header -->
    <header class="header-block header-block_container-width_lg">
        <div class="header-block__wrap header-block_display_destop">
            <div class="logo">
                <a href="/">
                    <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" alt="logo">
                </a>
            </div>
            <div class="header-block__func-btns">
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/local/include/phone.php"
                    )
                );?>
                <?$APPLICATION->IncludeComponent("bitrix:menu", "true-code-menu", Array(
                    "ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
                    "CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
                    "DELAY" => "N",	// Откладывать выполнение шаблона меню
                    "MAX_LEVEL" => "2",	// Уровень вложенности меню
                    "MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
                        0 => "",
                    ),
                    "MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
                    "MENU_CACHE_TYPE" => "N",	// Тип кеширования
                    "MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
                    "MENU_THEME" => "site",	// Тема меню
                    "ROOT_MENU_TYPE" => "left",	// Тип меню для первого уровня
                    "USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
                ),
                    false
                );?>
                <!--                <nav class="navigation">-->
                <!--                    <ul class="navigation__list">-->
                <!--                        <li class="navigation__item"><a href="#">Вакансии</a></li>-->
                <!--                        <li class="navigation__item"><a href="#">Кто мы?</a></li>-->
                <!--                        <li class="navigation__item"><a href="#">Что мы предлагаем?</a></li>-->
                <!--                        <li class="navigation__item"><a href="#">Отзывы</a></li>-->
                <!--                        <li class="navigation__item"><a href="#">Правила</a></li>-->
                <!--                    </ul>-->
                <!--                </nav>-->
                <button class="btn-form">Подать заявку</button>
            </div>
        </div>
        <div class="header-block__wrap-mobile header-block_display_mobile">
            <div class="header-block__logo-menu">
                <div class="logo">
                    <a href="/">
                        <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.png" alt="logo">
                    </a>
                </div>
                <div class="burger-menu js-burger-menu">
                    <svg width="41" height="33" viewBox="0 0 41 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M3 3H38M3 16.5H38M3 30H38" stroke="#352958" stroke-width="6" stroke-linecap="round" />
                    </svg>
                </div>
            </div>
            <div class="header-block__contacts">
                <div class="header-block__email-phone">
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/local/include/phone.php"
                        )
                    );?>
                    <a href="mailto:support@t-code.ru" class="phone">support@t-code.ru</a>
                </div>
                <div>
                    <button class="btn-form">Подать заявку</button>
                </div>
            </div>
        </div>
        <!-- Header mobile navigation -->
        <div class="nav-block__mobile js-nav-block__mobile">
            <div class="nav-block__menu">
                <?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"true-code-menu-mobile", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "podmenu",
		"DELAY" => "N",
		"MAX_LEVEL" => "2",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "N",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"MENU_THEME" => "site",
		"ROOT_MENU_TYPE" => "left",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "true-code-menu-mobile"
	),
	false
);?>
            </div>
            <div class="nav-block__info">
                <div>
                    <?$APPLICATION->IncludeComponent(
                        "bitrix:main.include",
                        "",
                        Array(
                            "AREA_FILE_SHOW" => "file",
                            "AREA_FILE_SUFFIX" => "inc",
                            "EDIT_TEMPLATE" => "",
                            "PATH" => "/local/include/phone.php"
                        )
                    );?>
                </div>
                <?$APPLICATION->IncludeComponent(
                    "bitrix:main.include",
                    "",
                    Array(
                        "AREA_FILE_SHOW" => "file",
                        "AREA_FILE_SUFFIX" => "inc",
                        "EDIT_TEMPLATE" => "",
                        "PATH" => "/local/include/networks.php"
                    )
                );?>
            </div>
        </div>

    </header <main>