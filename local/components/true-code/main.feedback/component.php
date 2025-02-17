<?php
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die();

/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponent $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$arResult["PARAMS_HASH"] = md5(serialize($arParams) . $this->GetTemplateName());

$arParams["USE_CAPTCHA"] = (($arParams["USE_CAPTCHA"] != "N" && !$USER->IsAuthorized()) ? "Y" : "N");
$arParams["EVENT_NAME"] = trim($arParams["EVENT_NAME"]);
if ($arParams["EVENT_NAME"] == '')
    $arParams["EVENT_NAME"] = "FEEDBACK_FORM";
$arParams["EMAIL_TO"] = trim($arParams["EMAIL_TO"]);
if ($arParams["EMAIL_TO"] == '')
    $arParams["EMAIL_TO"] = COption::GetOptionString("main", "email_from");
$arParams["OK_TEXT"] = trim($arParams["OK_TEXT"]);
if ($arParams["OK_TEXT"] == '')
    $arParams["OK_TEXT"] = GetMessage("MF_OK_MESSAGE");

if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["submit"] <> '' && (!isset($_POST["PARAMS_HASH"]) || $arResult["PARAMS_HASH"] === $_POST["PARAMS_HASH"])) {
    $arResult["ERROR_MESSAGE"] = array();
    if (check_bitrix_sessid()) {
        if (empty($arParams["REQUIRED_FIELDS"]) || !in_array("NONE", $arParams["REQUIRED_FIELDS"])) {
            if ((empty($arParams["REQUIRED_FIELDS"]) || in_array("NAME", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["user_name"]) <= 1)
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_NAME");
            if ((empty($arParams["REQUIRED_FIELDS"]) || in_array("EMAIL", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["user_email"]) <= 1)
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_EMAIL");
            if ((empty($arParams["REQUIRED_FIELDS"]) || in_array("MESSAGE", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["MESSAGE"]) <= 3)
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_MESSAGE");
            if ((empty($arParams["REQUIRED_FIELDS"]) || in_array("user_intership", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["user_intership"]) <= 3)
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_INTERSHIP");
            if ((empty($arParams["REQUIRED_FIELDS"]) || in_array("user_portfolio_link", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["user_portfolio_link"]) <= 3)
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PORTFOLIO_LINK");
            if ((empty($arParams["REQUIRED_FIELDS"]) || in_array("user_portfolio_file", $arParams["REQUIRED_FIELDS"])) && empty($_FILES["user_portfolio_file"]["name"]))
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PORTFOLIO_FILE");
            if ((empty($arParams["REQUIRED_FIELDS"]) || in_array("user_phone_email", $arParams["REQUIRED_FIELDS"])) && mb_strlen($_POST["user_phone_email"]) <= 3)
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_PHONE_EMAIL");
        }
        if (mb_strlen($_POST["user_email"]) > 1 && !check_email($_POST["user_email"]))
            $arResult["ERROR_MESSAGE"][] = GetMessage("MF_EMAIL_NOT_VALID");
        if ($arParams["USE_CAPTCHA"] == "Y") {
            $captcha_code = $_POST["captcha_sid"];
            $captcha_word = $_POST["captcha_word"];
            $cpt = new CCaptcha();
            $captchaPass = COption::GetOptionString("main", "captcha_password", "");
            if ($captcha_word <> '' && $captcha_code <> '') {
                if (!$cpt->CheckCodeCrypt($captcha_word, $captcha_code, $captchaPass))
                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTCHA_WRONG");
            } else
                $arResult["ERROR_MESSAGE"][] = GetMessage("MF_CAPTHCA_EMPTY");
        }
        if (empty($arResult["ERROR_MESSAGE"])) {
            // Обработка загруженного файла
            $portfolioFilePath = '';
            if (!empty($_FILES["user_portfolio_file"]["name"])) {
                $uploadDir = $_SERVER["DOCUMENT_ROOT"] . "/upload/feedback_portfolio/";
                if (!is_dir($uploadDir)) {
                    mkdir($uploadDir, 0755, true);
                }
                $fileName = time() . '_' . basename($_FILES["user_portfolio_file"]["name"]);
                $filePath = $uploadDir . $fileName;
                if (move_uploaded_file($_FILES["user_portfolio_file"]["tmp_name"], $filePath)) {
                    $portfolioFilePath = str_replace($_SERVER["DOCUMENT_ROOT"], '', $filePath);;
                } else {
                    $arResult["ERROR_MESSAGE"][] = GetMessage("MF_REQ_FILE_UPLOAD_ERROR");
                }
            }

            $arFields = array(
                "AUTHOR" => $_POST["user_name"],
                "AUTHOR_EMAIL" => $_POST["user_email"],
                "EMAIL_TO" => $arParams["EMAIL_TO"],
                "user_intership" => $_POST["user_intership"],
                "user_portfolio_link" => $_POST["user_portfolio_link"],
                "user_portfolio_file" => $portfolioFilePath, // Передаём путь к файлу
                "user_phone_email" => $_POST["user_phone_email"],
                "TEXT" => $_POST["MESSAGE"],
            );

            if (!empty($arParams["EVENT_MESSAGE_ID"])) {
                foreach ($arParams["EVENT_MESSAGE_ID"] as $v)
                    if (intval($v) > 0)
                        CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields, "N", intval($v));
            } else
                CEvent::Send($arParams["EVENT_NAME"], SITE_ID, $arFields);

            $_SESSION["MF_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
            $_SESSION["MF_EMAIL"] = htmlspecialcharsbx($_POST["user_email"]);
            $_SESSION["MF_user_intership"] = htmlspecialcharsbx($_POST["user_intership"]);
            $_SESSION["MF_user_portfolio_link"] = htmlspecialcharsbx($_POST["user_portfolio_link"]);
            $_SESSION["MF_user_portfolio_file"] = $portfolioFilePath; // Сохраняем путь к файлу в сессии
            $_SESSION["MF_user_phone_email"] = htmlspecialcharsbx($_POST["user_phone_email"]);
            $event = new \Bitrix\Main\Event('main', 'onFeedbackFormSubmit', $arFields);
            $event->send();
            LocalRedirect($APPLICATION->GetCurPageParam("success=" . $arResult["PARAMS_HASH"], array("success")));
        }

        $arResult["MESSAGE"] = htmlspecialcharsbx($_POST["MESSAGE"]);
        $arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_POST["user_name"]);
        $arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_POST["user_email"]);
        $arResult["user_intership"] = htmlspecialcharsbx($_POST["user_intership"]);
        $arResult["user_portfolio_link"] = htmlspecialcharsbx($_POST["user_portfolio_link"]);
        $arResult["user_portfolio_file"] = htmlspecialcharsbx($_POST["user_portfolio_file"]);
        $arResult["user_phone_email"] = htmlspecialcharsbx($_POST["user_phone_email"]);
    } else
        $arResult["ERROR_MESSAGE"][] = GetMessage("MF_SESS_EXP");
} elseif ($_REQUEST["success"] == $arResult["PARAMS_HASH"]) {
    $arResult["OK_MESSAGE"] = $arParams["OK_TEXT"];
}

if (empty($arResult["ERROR_MESSAGE"])) {
    if ($USER->IsAuthorized()) {
        $arResult["AUTHOR_NAME"] = $USER->GetFormattedName(false);
        $arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($USER->GetEmail());
    } else {
        if ($_SESSION["MF_NAME"] <> '')
            $arResult["AUTHOR_NAME"] = htmlspecialcharsbx($_SESSION["MF_NAME"]);
        if ($_SESSION["MF_EMAIL"] <> '')
            $arResult["AUTHOR_EMAIL"] = htmlspecialcharsbx($_SESSION["MF_EMAIL"]);
        if ($_SESSION["user_intership"] <> '')
            $arResult["user_intership"] = htmlspecialcharsbx($_SESSION["MF_user_intership"]);
        if ($_SESSION["user_portfolio_link"] <> '')
            $arResult["user_portfolio_link"] = htmlspecialcharsbx($_SESSION["MF_user_portfolio_link"]);
        if ($_SESSION["user_portfolio_file"] <> '')
            $arResult["user_portfolio_file"] = htmlspecialcharsbx($_SESSION["MF_user_portfolio_file"]); // Возвращаем путь к файлу
        if ($_SESSION["user_phone_email"] <> '')
            $arResult["user_phone_email"] = htmlspecialcharsbx($_SESSION["MF_user_phone_email"]);
    }
}

if ($arParams["USE_CAPTCHA"] == "Y")
    $arResult["capCode"] = htmlspecialcharsbx($APPLICATION->CaptchaGetCode());

$this->IncludeComponentTemplate();