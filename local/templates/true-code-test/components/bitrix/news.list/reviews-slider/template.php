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
<div class="reviews-block">
    <div class="swiper reviews-block__slider" id="js-reviews-slider">
        <div class="reviews-slider__wrapper swiper-wrapper">
            <?if($arParams["DISPLAY_TOP_PAGER"]):?>
            <?=$arResult["NAV_STRING"]?><br />
            <?endif;?>

            <?foreach($arResult["ITEMS"] as $arItem):?>
            <?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
            <div class="swiper-slide reviews-slider__swiper-slide">
                <div class="reviews-slider__slide">
                    <div class="reviews-slider__image">
                        <?if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])):?>
                        <?if(!$arParams["HIDE_LINK_WHEN_NO_DETAIL"] || ($arItem["DETAIL_TEXT"] && $arResult["USER_HAVE_ACCESS"])):?>
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                            width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                            height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                            alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                            title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />
                        <?else:?>
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>"
                            width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>"
                            height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>"
                            alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"
                            title="<?=$arItem["PREVIEW_PICTURE"]["TITLE"]?>" />
                        <?endif;?>
                        <?endif?>
                        <div class="reviews-slider__caption reviews-slider_caption_mob">
                            <p>
                                <?=$arItem["NAME"]?>
                            </p>
                            <p>
                                <?=$arItem["PROPERTIES"]["JOB_TITLE"]["VALUE"]?>
                            </p>
                        </div>
                    </div>
                    <div class="reviews-slider__desc">
                        <div class="reviews-slider__text">
                            <?=$arItem["DETAIL_TEXT"];?>
                        </div>
                        <div class="reviews-slider__caption reviews-slider_caption_desk">
                            <p>
                                <?=$arItem["NAME"]?>
                            </p>
                            <p>
                                <?=$arItem["PROPERTIES"]["JOB_TITLE"]["VALUE"]?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <?endforeach;?>
        </div>
    </div>
    <div class="reviews-slider__pagination">
        <?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
        <br /><?=$arResult["NAV_STRING"]?>
        <?endif;?>
        <div class="reviews-slider__pagination-next">
            <svg width="25" height="15" viewBox="0 0 25 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M1.22165 3.77418L11.0977 13.6502C11.8681 14.4166 13.1124 14.4166 13.8828 13.6502L23.7589 3.77418C24.3929 3.03548 24.3929 1.94316 23.7589 1.20446C23.0497 0.376805 21.8014 0.280083 20.9738 0.989202L12.5001 9.46277L4.00672 0.989101C3.23634 0.222706 1.99202 0.222706 1.22165 0.9891C0.455253 1.75948 0.455253 3.0039 1.22165 3.77418Z" />
            </svg>
        </div>
    </div>
</div>

<script>

</script>