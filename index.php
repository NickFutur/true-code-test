<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("description", "Устройства для обработки поверхности рулонных материалов. Инструментальные работы.");
$APPLICATION->SetPageProperty("keywords", "липской завод, рулонные, обработка, инструментальные.");
$APPLICATION->SetPageProperty("title", "Обработка поверхности рулонных материалов. Инструментальные работы.");
$APPLICATION->SetPageProperty("NOT_SHOW_NAV_CHAIN", "Y");
$APPLICATION->SetTitle("Липской завод");
?>
<main>
    <?$APPLICATION->IncludeComponent(
	"bitrix:main.include",
	"",
	Array(
		"AREA_FILE_SHOW" => "file",
		"AREA_FILE_SUFFIX" => "inc",
		"EDIT_TEMPLATE" => "",
		"PATH" => "/local/include/banner-block.php"
	)
);?>
    <?$APPLICATION->IncludeComponent(
	"bitrix:catalog.top",
	"vakansii-slider",
	Array(
		"ACTION_VARIABLE" => "action",
		"ADD_PICT_PROP" => "-",
		"ADD_PROPERTIES_TO_BASKET" => "N",
		"BASKET_URL" => "/personal/basket.php",
		"CACHE_FILTER" => "N",
		"CACHE_GROUPS" => "Y",
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "N",
		"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
		"COMPATIBLE_MODE" => "N",
		"DETAIL_URL" => "/vakansii/?SECTION_ID=&ELEMENT_ID=#ELEMENT_ID#",
		"DISPLAY_COMPARE" => "N",
		"ELEMENT_COUNT" => "9",
		"ELEMENT_SORT_FIELD" => "sort",
		"ELEMENT_SORT_FIELD2" => "id",
		"ELEMENT_SORT_ORDER" => "asc",
		"ELEMENT_SORT_ORDER2" => "desc",
		"ENLARGE_PRODUCT" => "STRICT",
		"FILTER_NAME" => "",
		"IBLOCK_ID" => "6",
		"IBLOCK_TYPE" => "vakansii",
		"LABEL_PROP" => array(),
		"LINE_ELEMENT_COUNT" => "3",
		"MESS_BTN_ADD_TO_BASKET" => "",
		"MESS_BTN_BUY" => "",
		"MESS_BTN_COMPARE" => "",
		"MESS_BTN_DETAIL" => "Подробнее",
		"MESS_NOT_AVAILABLE" => "",
		"MESS_NOT_AVAILABLE_SERVICE" => "",
		"OFFERS_LIMIT" => "5",
		"PARTIAL_PRODUCT_PROPERTIES" => "N",
		"PRICE_CODE" => array(),
		"PRICE_VAT_INCLUDE" => "N",
		"PRODUCT_BLOCKS_ORDER" => "price,props,sku,quantityLimit,quantity,buttons",
		"PRODUCT_ID_VARIABLE" => "id",
		"PRODUCT_PROPS_VARIABLE" => "prop",
		"PRODUCT_QUANTITY_VARIABLE" => "quantity",
		"PRODUCT_ROW_VARIANTS" => "[{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false},{'VARIANT':'2','BIG_DATA':false}]",
		"PRODUCT_SUBSCRIPTION" => "N",
		"ROTATE_TIMER" => "30",
		"SECTION_URL" => "/vakansii/",
		"SEF_MODE" => "N",
		"SHOW_PAGINATION" => "N",
		"SHOW_PRICE_COUNT" => "1",
		"SHOW_SLIDER" => "Y",
		"SLIDER_INTERVAL" => "3000",
		"SLIDER_PROGRESS" => "N",
		"TEMPLATE_THEME" => "blue",
		"USE_ENHANCED_ECOMMERCE" => "N",
		"USE_PRICE_COUNT" => "N",
		"USE_PRODUCT_QUANTITY" => "N",
		"VIEW_MODE" => "SLIDER"
	)
);?>
    <div class="modal-image banner-block_indent_lg">
        <div class="modal-image__wrap">
            <img alt="3D object model" src="<?=SITE_TEMPLATE_PATH?>/images/objects-three-d.png">
        </div>
    </div>
    <div class="feedback-block banner-block_indent_lg">
        <div class="feedback-block__wrap header-block_container-width_lg">
            <h3 class="feedback-block__title">Заявка</h3>
            <?$APPLICATION->IncludeComponent(
	"true-code:main.feedback",
	"main-feedback-form",
	Array(
		"EMAIL_TO" => "morinnikita31@gmail.com",
		"EVENT_MESSAGE_ID" => array("13"),
		"OK_TEXT" => "Спасибо, ваша заявка принята",
		"REQUIRED_FIELDS" => array("NAME", "user_phone_email", "user_intership", "feedback_subscribe"),
		"USE_CAPTCHA" => "N"
	)
);?>
        </div>
    </div>
</main>
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>