<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
use \Bitrix\Main\Localization\Loc;

?>
<div class="slide-one-item home-slider owl-carousel">
    <?
    foreach ($arResult["ITEMS"] as $arItem): ?>
        <?
        if ($arItem["DISPLAY_PROPERTIES"]["SLIDER"]["ACTIVE"] == "Y"): ?>
            <?
            $this->AddEditAction(
                $arItem['ID'],
                $arItem['EDIT_LINK'],
                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT")
            );
            $this->AddDeleteAction(
                $arItem['ID'],
                $arItem['DELETE_LINK'],
                CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM'))
            );
            ?>
            <div id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <div class="img site-blocks-cover"
                             style="background-image: url(<?
                             echo $arItem["PREVIEW_PICTURE"]["SRC"] ?>);" data-aos="fade"
                             data-stellar-background-ratio="0.5">
                            <div class="text">
                                <h2><?
                                    echo $arItem["NAME"] ?></p></h2>
                                <p class="mb-2"><?
                                    echo $arItem["PREVIEW_TEXT"] ?></p>
                                <p class="mb-0"><a href="<?
                                    echo $arItem["DETAIL_PAGE_URL"] ?>"
                                                   class="text-uppercase small letter-spacing-1 font-weight-bold"><?
                                        echo Loc::GetMessage(
                                            "MORE_DETAILS"
                                        ) ?></a>
                                </p>
                            </div>
                </div>
            </div>
        <?endif;
    endforeach; ?>
</div>
