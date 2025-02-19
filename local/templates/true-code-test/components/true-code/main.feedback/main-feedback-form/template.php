<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */
?>
<div class="mfeedback">
    <?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if($arResult["OK_MESSAGE"] <> '')
{
	?>
    <div class="mf-ok-text"><?=$arResult["OK_MESSAGE"]?></div>
    <?
}
?>

    <form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="feedback-form" id="main-feedback-form"
        enctype="multipart/form-data">
        <?=bitrix_sessid_post()?>
        <div class="feedback-form__name">
            <label for="user_name" class="feedback-form__label feedback-form__text"><?=GetMessage("MFT_NAME")?></label>
            <input type="text" id="user_name" name="user_name" class="feedback-form__input feedback-form__text"
                title="Заполните имя" value="<?=$arResult["AUTHOR_NAME"]?>" <?if(empty($arParams["REQUIRED_FIELDS"]) ||
                in_array("NAME", $arParams["REQUIRED_FIELDS"])): echo "required" ;?>
            <?endif?> >
        </div>
        <div class="feedback-form__phone js-feedback-form__phone">
            <label for="feedback-phone-email"
                class="feedback-form__label feedback-form__text"><?=GetMessage("MFT_EMAIL")?></label>
            <input type="text" id="feedback-phone-email" name="user_phone_email"
                class="feedback-form__input feedback-form__text" title="<?=GetMessage("MFT_EMAIL")?>"
                value="<?=$arResult["user_phone_email"]?>" <?if(empty($arParams["REQUIRED_FIELDS"]) ||
                in_array("user_phone_email", $arParams["REQUIRED_FIELDS"])): echo "required" ;?>
            <?endif?> placeholder="+7(96_)_-_-_">
            <span class="feedback-form__error-message_none">* введите номер в формате: XXXX</span>
        </div>
        <div class="feedback-form__internship">
            <label for="internship"
                class="feedback-form__label feedback-form__text"><?=GetMessage("MFT_INTERSHIP")?></label> <input
                type="text" id="internship" name="user_intership" class="feedback-form__input feedback-form__text"
                title="Заполните направление стажировки" value="<?=$arResult["user_intership"]?>"
                <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("user_intership", $arParams["REQUIRED_FIELDS"])):
                echo "required" ;?>
            <?endif?>>
        </div>
        <div class="feedback-form__portfolio-link">
            <div>
                <label for="portfolio-link"
                    class="feedback-form__label feedback-form__text"><?=GetMessage("MFT_PORTFOLIO_LINK")?></label>
                <input type="url" id="portfolio-link" name="user_portfolio_link"
                    class="feedback-form__input feedback-form__text" title="Вставьте ссылку на ваше портфолио"
                    value="<?=$arResult["user_portfolio_link"]?>" <?if(empty($arParams["REQUIRED_FIELDS"]) ||
                    in_array("user_portfolio_link", $arParams["REQUIRED_FIELDS"])): echo "required" ;?>
                <?endif?>>
            </div>
            <p class="feedback-form__text feedback-form_indent_tb">
                или
            </p>
            <div title="<?=GetMessage("MFT_PORTFOLIO_FILE")?>">
                <label class="feedback-form__file-upload"> <input type="file" style="display: none;"
                        id="feedback-form__file-upload" name="user_portfolio_file"
                        accept=".pdf,.doc,.docx,.jpg,.png,.txt" value="<?=$arResult["user_portfolio_file"]?>"
                        <?if(empty($arParams["REQUIRED_FIELDS"]) || in_array("user_portfolio_link",
                        $arParams["REQUIRED_FIELDS"])): echo "required" ;?>
                    <?endif?>>
                </label> <label id="feedback-form__file-upload-text" for="feedback-form__file-upload"
                    class="feedback-form__text feedback-form__file-upload-text"><?=GetMessage("MFT_PORTFOLIO_FILE")?></label>
            </div>
        </div>
        <div class="feedback-form__message">
            <textarea id="userInfo" name="MESSAGE" rows="5" cols="50" placeholder="<?=GetMessage("MFT_MESSAGE")?>"
                class="feedback-form__message-area feedback-form__text" <?if(empty($arParams["REQUIRED_FIELDS"]) ||
                in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])): echo "requared"
                ?><?endif?>><?=$arResult["MESSAGE"]?></textarea>
        </div>

        <div class="feedback-form__subscribe">
            <label class="feedback-form__checkbox js-feedback-form__checkbox"> <input type="checkbox" id="subscribe"
                    name="subscribe" class="feedback-form__input" required> </label> <label for="subscribe"
                class="feedback-form__text feedback-form__checkbox-text"><?=GetMessage("MFT_SUBSCRIBE_TEXT")?></label>
        </div>
        <?if($arParams["USE_CAPTCHA"] == "Y"):?>
        <div class="mf-captcha">
            <div class="mf-text"><?=GetMessage("MFT_CAPTCHA")?></div>
            <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40"
                alt="CAPTCHA">
            <div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
            <input type="text" name="captcha_word" size="30" maxlength="50" value="">
        </div>
        <?endif;?>

        <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
        <input type="submit" name="submit" value="<?=GetMessage("MFT_SUBMIT")?>"
            class="btn-form traineeship-slider__link feedback-form__submit-btn" id="js-feedback-form__submit">
    </form>
</div>

<script>
const feedbackFormFileupload = document.getElementById(
    "feedback-form__file-upload"
);

feedbackFormFileupload.addEventListener("change", function() {
    let fileName = this.value.split("\\").pop(); // Получаем имя файла
    document.getElementById("feedback-form__file-upload-text").textContent =
        fileName ? fileName : "Прикрепить файл портфолио"; // Обновляем текст
});

const subscribeInput = document.getElementById("subscribe");
const feedbackFormCheckbox = document.querySelector(
    ".js-feedback-form__checkbox"
);
subscribeInput.addEventListener("change", () => {
    feedbackFormCheckbox.classList.toggle(
        "feedback-form__checkbox-agree",
        subscribeInput.checked
    );
});

const mainFeedbackForm = document.getElementById('js-feedback-form__submit');
const feedbackPhoneEmailInput = document.getElementById('feedback-phone-email');
const feedbackFormPhoneEmailBlock = document.querySelector('.js-feedback-form__phone');
const errorMessage = feedbackFormPhoneEmailBlock.querySelector(".feedback-form__error-message_none");
mainFeedbackForm.addEventListener('click', () => {
    if (feedbackPhoneEmailInput.hasAttribute('required') && feedbackPhoneEmailInput.value.trim() === '') {
        errorMessage.classList.add("feedback-form__error-message_block");
    }
});
</script>