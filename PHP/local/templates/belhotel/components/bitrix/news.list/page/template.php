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
//prnt($arResult);
?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	$count = count($arItem["DISPLAY_PROPERTIES"]["IMG"]["VALUE"]);
	?>
<div id="<?=$this->GetEditAreaId($arItem['ID']);?>">
    <!--slider-->
    <div class="room-slider">
        <div class="room-slider-container">
            <div class="swiper-wrapper">
                <?foreach ($arItem["DISPLAY_PROPERTIES"]["IMG"]["FILE_VALUE"] as $arSlide):?>
                <div class="swiper-slide">
                    <div style="background:url('<?=$arSlide["SRC"]?>') no-repeat top center; background-size:cover;" class="room-slider__img"></div>
                </div>
                <?endforeach;?>
            </div>
            <?if($count>1):?>
            <div class="room-slider-pagination"></div>
            <?endif;?>
        </div>
		<?if($count>1):?>
        <div class="next room-slider-button-next"></div>
        <div class="prev room-slider-button-prev"></div>
		<?endif;?>
    </div>
    <!--end slider-->
    <!--content-->
    <div class="room-content">
        <div class="content-prev">
            <div class="room-content-prev__ttl">
                <h1><?=$arItem["NAME"]?></h1>
            </div>
        </div>
        <div class="room-content-prev__desc">
            <?=$arItem["DETAIL_TEXT"]?>
        </div>
        <div class="docs">
            <?foreach ($arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"] as $arFile):?>
            <div class="docs__item">
                <a href="<?=$arFile["SRC"]?>" class="document"><?=$arFile["ORIGINAL_NAME"]?></a>
            </div>
            <?endforeach;?>
        </div>
    </div>
</div>
<?endforeach;?>
<!--end content-->