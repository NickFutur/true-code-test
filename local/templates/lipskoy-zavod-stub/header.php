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
        Asset::getInstance()->addCss("https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/lib/bootstrap/css/bootstrap.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/lib/bootstrap/css/bootstrap.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/lib/font-awesome/css/font-awesome.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/lib/font-awesome/css/font-awesome.min.css");

        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/lib/font-awesome/css/fontawesome-all.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/lib/ionicons/css/ionicons.min.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/lib/aos/aos.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/style.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/template_style.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/custom.css");
        Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/text_animate.css");
        ?>
    <title>
        <?$APPLICATION->ShowTitle()?>
    </title>
</head>

<body id="page-top">
    <? $APPLICATION->ShowPanel(); ?>
    <!-- Отображение административной панели внизу страницы -->


    <!-- Header -->
    <header id="header" class="header <? if ($curPage == '/') { echo " header-index" ; } else { echo "header-inner" ; }
        ?>">
        <section class="header-section header-index-section">
            <!-- small-header -->
            <div class="container">
                <div class="row operating_mode_lang clearfix pt-md-2 pb-md-2 pt-sm-2 pb-sm-1 align-middle d-flex h-100 align-items-center justify-content-center"
                    data-aos="fade" data-aos-duration="500" data-aos-delay="0">
                    <!-- calendar -->
                    <div class="operating_mode col-6 col-md-8 no-gutters d-block">
                        <div class="row">
                            <div class="time col-md-5">
                                <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/time.php"
	)
);?>
                            </div>
                            <div class="week_mode col-md-3 justify-content-left">
                                <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/day-text.php"
	)
);?>
                            </div>
                            <div class="col-md-4"></div>
                        </div>
                    </div>
                    <!-- Lang -->
                    <div
                        class="lang_section col-6 col-sm-6 col-md-4 py-1 py-sm-0 py-md-0 pt-sm-0 pt-md-1 no-gutters text-right pull-right">
                        <div class="firm-titile w-100">
                            <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/firm-title.php"
	)
);?>
                        </div>
                    </div>
                </div>
                <div class="w-100 offset-0 header-separator"></div>
            </div>

            <!-- #small-header -->

            <!-- Logo/Menu -->
            <div class="nav-fixed-top animated menu-sticky" data-aos="fade" data-aos-duration="500"
                data-aos-delay="100">
                <div class="container">
                    <div class="row py-xl-3 py-md-3 py-3 header_logo_section">
                        <!-- nav-header -->
                        <div id="nav-menu" class="header-nav col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <div class="row no-gutters">
                                <!-- Logo -->
                                <div id="logo"
                                    class="col-4 col-sm-4 col-md-2 col-lg-2 no-gutters d-md-flex h-100 align-items-center justify-content-left text-left">
                                    <a class="navbar-brand scrollto" href="/">
                                        <img src="<?=SITE_TEMPLATE_PATH?>/img/logo.png" class="img-fluid d-block"
                                            alt="Логотип Липской завод">
                                    </a>
                                </div>

                                <!-- call-btn-header-xs -->
                                <div class="call-btn col-7 col-sm-7 col-md-0 col-lg-0 d-md-none d-xl-none">
                                    <div class="d-flex d-md-flex d-lg-flex h-100 align-items-center justify-content-end text-right menuZIndex"
                                        id="menuPhone">
                                        <a href="#" title="Call me back"
                                            class="d-block d-md-none d-xl-none pr-3 ico-gradient"><i
                                                class="fas fa-phone"></i></a>
                                    </div>
                                </div>
                                <div
                                    class="col-1 col-sm-1 align-self-center col-md-9 col-lg-9 offset-0 offset-md-1 offset-lg-1">
                                    <nav class="navbar row no-gutters px-md-0 px-sm-0 d-md-flex h-100"
                                        style="<? if (str_contains($curPage, '/metalloobrabotka/')) { echo 'padding-top: 20px !important;' ; } else { echo '' ; }?>"
                                        role="navigation">
                                        <div id="mySidenav1" class="sidenav d-none d-md-block">
                                            <?$APPLICATION->IncludeComponent("bitrix:menu", "main-menu-template-desktop", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);?>
                                            <!-- <ul class="nav-menu d-lg-flex d-md-flex d-sm-flex w-100">

                      <li class="active"><a href="/" class="nav-link">Главная</a></li>
                                                <li><a href="direction-one.html" class="nav-link">Направление 1</a></li>
                                                <li><a href="direction-two.html" class="nav-link">Направление 2</a></li>
                                                <li><a href="#" class="nav-link">Новости</a></li>
                                                <li class="conatcts-link"><a href="#" class="nav-link">Контакты</a></li>
                      </ul>-->
                                        </div>
                                        <span onclick="openNav()" class="nav-menu-show-btn btn-nav menuZIndex"
                                            id="menuBar"><i class="fas fa-bars"></i></span>
                                    </nav>

                                </div>
                            </div>
                        </div><!-- #nav-header -->

                        <!-- call-btn-header -->
                        <!-- <div class="call-btn col-0 col-md-3 col-lg-2">
              <div
                class="d-flex d-md-flex d-lg-flex h-100 w-100 align-items-center justify-content-center text-md-right text-lg-right pull-right">
                <a href="#" class="d-none d-md-block w-100 btn btn-default btn-gradient pull-right"><span>Call me
                    back</span></a>
              </div>
            </div> -->
                    </div>
                </div>


                <!-- nav sm/xs -->
                <div id="nav-menu-xs" class="header-nav animated fadeInDown" data-aos="fade-down"
                    data-aos-duration="500" data-aos-delay="100">
                    <nav class="navbar row no-gutters px-md-0 px-sm-0 d-md-flex h-100 animated fadeInDown"
                        role="navigation" data-aos="fade-down" data-aos-duration="500" data-aos-delay="100">
                        <div id="mySidenav" class="sidenav d-block d-md-none d-xl-none animated fadeInDown"
                            data-aos="fade-down" data-aos-duration="500" data-aos-delay="100">

                            <!-- <ul class="nav-menu d-sm-flex w-100 animated fadeInDown" data-aos="fade-down" data-aos-duration="500"
                data-aos-delay="100">
                <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                <li class="active"><a href="/" class="nav-link">Главная</a></li>
                <li><a href="#!" class="nav-link">Направление 1</a></li>
                <li><a href="d#!" class="nav-link">Направление 2</a></li>
                <li><a href="#!" class="nav-link">Новости</a></li>
                <li><a href="#!" class="nav-link">Контакты</a></li>
              </ul>-->
                            <?$APPLICATION->IncludeComponent("bitrix:menu", "main-menu-template-mobile", Array(
	"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
		"CHILD_MENU_TYPE" => "left",	// Тип меню для остальных уровней
		"DELAY" => "N",	// Откладывать выполнение шаблона меню
		"MAX_LEVEL" => "1",	// Уровень вложенности меню
		"MENU_CACHE_GET_VARS" => array(	// Значимые переменные запроса
			0 => "",
		),
		"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
		"MENU_CACHE_TYPE" => "N",	// Тип кеширования
		"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
		"ROOT_MENU_TYPE" => "top",	// Тип меню для первого уровня
		"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
	),
	false
);?>
                        </div>

                    </nav>
                </div>
            </div><!-- #call-btn-header -->
            <? if ($curPage == "/") { ?>
            <!-- Header-banner -->
            <div class="container banner-conteiner">
                <div class="header-banner row pt-1 pt-md-0 pb-1 pb-sm-5 pb-md-3 mb-2 mb-sm-2 mb-md-0" data-aos="fade"
                    data-aos-duration="1000" data-aos-delay="100">
                    <div class="banner-section col-12 no-gutters d-md-flex align-items-center justify-content-left">
                        <div
                            class="banner-slogan d-flex flex-column justify-content-between align-items-center pull-left pr-3 pr-sm-5 pb-5 pb-sm-5 pd-xl-5 pb-md-5 pb-xl-0 ml-0">
                            <div class="d-flex justify-content-between align-items-center">
                                <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/title-main-page.php"
	)
);?>
                                <img src="<?=SITE_TEMPLATE_PATH?>/img/logo-main-page.svg" alt="логотип"> <br>
                            </div>
                            <div class="banner-additional-text">
                                <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/title-desc.php"
	)
);?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #Header-banner -->
            <? } ?>
        </section>
    </header><!-- #header -->
    <!-- breadcrumb -->
    <?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"breadcrumb-template-1", 
	array(
		"COMPONENT_TEMPLATE" => "breadcrumb-template-1",
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s1"
	),
	false
);?>
    <!-- breadcrumb -->