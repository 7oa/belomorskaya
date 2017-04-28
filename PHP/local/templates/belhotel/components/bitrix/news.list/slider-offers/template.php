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
<div class="special-offers-wrapper">
    <div class="container">
        <div class="special-offers-wrapper-ttl"><?=$arResult["NAME"]?></div>
        <div class="special-offers-swiper-container">
            <div class="swiper-wrapper">
				<?foreach($arResult["ITEMS"] as $arItem):?>
					<?
					$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
					$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
					?>
                    <div class="swiper-slide" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                        <div class="special-offers-swiper-container__item">
                            <div class="row">
                                <div class="col-lg-6 col-xs-12">
                                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="special-offers-swiper-container__img"><img src="<?=$arItem["PREVIEW_PICTURE"]["RESIZE"]?>"/></a>
                                </div>
                                <div class="col-lg-6 col-xs-12">
                                    <div class="special-offers-swiper-container__content">
                                        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="special-offers-swiper-container__ttl"><?=$arItem["NAME"]?></a>
                                        <div class="special-offers-swiper-container__text">
											<?=$arItem["PREVIEW_TEXT"]?>
                                        </div>
                                        <div class="special-offers-swiper-container__button"><a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="button-showmore">Подробнее</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
				<?endforeach;?>
            </div>
        </div>
		<?if(count($arResult["ITEMS"])>1):?>
            <div class="special-offers-swiper-pagination"></div>
            <div class="next special-offers-swiper-button-next"></div>
            <div class="prev special-offers-swiper-button-prev"></div>
		<?endif;?>
    </div>
</div>