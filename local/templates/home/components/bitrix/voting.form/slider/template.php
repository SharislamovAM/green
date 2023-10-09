<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
} ?>
<?if (empty($arResult["ERROR_MESSAGE"]) || $arResult["ERROR_MESSAGE"] == ""):
if (empty($arResult["OK_MESSAGE"]) || $arResult["OK_MESSAGE"] == "") :
?>
<?

if (!empty($arResult["QUESTIONS"])): ?>
    <form id="survey" action="<?=POST_FORM_ACTION_URI?>" method="post">
        <input type="hidden" name="vote" value="Y">
        <input type="hidden" name="PUBLIC_VOTE_ID" value="<?= $arResult["VOTE"]["ID"] ?>">
        <input type="hidden" name="VOTE_ID" value="<?= $arResult["VOTE"]["ID"] ?>">
        <?= bitrix_sessid_post() ?>
        <div style="background-image: url(<?
        SITE_TEMPLATE_PATH ?>/images/hero_bg_2.jpg)">
            <div class="nonloop-block-4 owl-carousel">
                <?
                foreach ($arResult["QUESTIONS"] as $arQuestion): ?>
                    <div class="site-blocks-cover">
                        <div class="text-center-center p-5 bg-white border">
                            <?
                            if ($arQuestion["IMAGE"] !== false): ?>
                                <img src="<?= $arQuestion["IMAGE"]["SRC"] ?>" width="30" height="30"/>
                            <?
                            endif ?>
                            <div class="d-flex justify-content-center">
                                <b><?= $arQuestion["QUESTION"] ?><?
                                    if ($arQuestion["REQUIRED"] == "Y") {
                                        echo "<span class='starrequired'>*</span>";
                                    } ?></b>
                            </div>
                            <?
                            foreach ($arQuestion["ANSWERS"] as $arAnswer): ?>
                                <div>
                                    <?
                                    $value = (isset($_REQUEST['vote_checkbox_' . $arAnswer["QUESTION_ID"]]) &&
                                        array_search(
                                            $arAnswer["ID"],
                                            $_REQUEST['vote_checkbox_' . $arAnswer["QUESTION_ID"]]
                                        ) !== false) ? 'checked="checked"' : '';
                                    ?>
                                    <label><input <?= $value ?> type="radio"
                                                                name="vote_radio_<?= $arAnswer["QUESTION_ID"] ?>"
                                                                value="<?= $arAnswer["ID"] ?>" <?= $arAnswer["~FIELD_PARAM"] ?> />&nbsp;<?= $arAnswer["MESSAGE"] ?>
                                    </label>
                                </div>
                            <?
                            endforeach ?>
                        </div>
                    </div>
                <?
                endforeach ?>
                <div class="site-blocks-cover">
                    <div class="text-center-center">
                        <?
                        if (isset($arResult["CAPTCHA_CODE"])): ?>
                            <div class="p-5 bg-white border">
                                <div class="vote-item-header">
                                    <div class="vote-item-title vote-item-question"><?= GetMessage(
                                            "F_CAPTCHA_TITLE"
                                        ) ?></div>
                                    <div class="vote-clear-float"></div>
                                </div>
                                <div class="vote-form-captcha">
                                    <input type="hidden" name="captcha_code"
                                           value="<?= $arResult["CAPTCHA_CODE"] ?>"/>
                                    <div class="vote-reply-field-captcha-image">
                                        <img src="/bitrix/tools/captcha.php?captcha_code=<?= $arResult["CAPTCHA_CODE"] ?>"
                                             alt="<?= GetMessage("F_CAPTCHA_TITLE") ?>"/>
                                    </div>
                                    <div class="vote-reply-field-captcha-label">
                                        <label for="captcha_word"><?= GetMessage("F_CAPTCHA_PROMT") ?><span
                                                    class='starrequired'>*</span></label><br/>
                                        <input type="text" size="20" name="captcha_word" autocomplete="off"/>
                                    </div>
                                </div>
                            </div>
                        <?
                        endif ?>
                        <div>
                            <input type="submit" class="btn btn-primary" id="myBtn" name="vote"
                                   value="<?= GetMessage("VOTE_SUBMIT_BUTTON") ?>">&nbsp;&nbsp;
                        </div>
                    </div>
                </div>
            </div>
    </form>
<?
endif;
?>
<?endif; ?>
    <?=ShowNote($arResult["OK_MESSAGE"])?>
<?
else:?>
    <?=ShowNote($arResult["ERROR_MESSAGE_MESSAGE"])?>
<?endif; ?>
<?$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH . "/components/bitrix/voting.form/slider/survey_slider.js");?>
