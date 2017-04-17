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
$count = count($arResult["PROPERTIES"]["IMG"]["LINKS"]);
?>
<!--room-slider-->
<div class="room-slider">
    <div class="room-slider-container">
        <div class="swiper-wrapper">
            <?foreach($arResult["PROPERTIES"]["IMG"]["LINKS"] as $arSlide):?>
            <div class="swiper-slide">
                <div style="background:url('<?=$arSlide?>') no-repeat top center; background-size:cover;" class="room-slider__img"></div>
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
<!--end room-slider-->
<!--room-content-->
<div class="room-content">
    <div class="room-content-prev">
        <div class="room-content-prev__ttl">
            <h1><?=$arResult["NAME"]?></h1>
        </div>
        <div class="room-content-prev__desc">
			<?=$arResult["PREVIEW_TEXT"]?>
        </div><a href="/reserv-<?=$arResult['CODE']?>/" class="button-reserv">Забронировать</a>
    </div>
    <!--room-fulldesc-->
    <div class="room-fulldesc">
        <h2>Описание</h2>
        <div class="room-fulldesc__text">
            <div class="row">
                <div class="col-lg-6 col-xs-12">
                    <div class="room-fulldesc__left"><?=$arResult["DETAIL_TEXT"]?></div>
                </div>
                <div class="col-lg-6">
                    <div class="room-fulldesc__right"><?=$arResult["PROPERTIES"]["DESC_RIGHT"]["VALUE"]["TEXT"]?></div>
                </div>
            </div>
        </div>
    </div>
    <!--end room-fulldesc-->
	<?if($arResult["PROPERTIES"]["INCLUDE"]["DATA"]):?>
    <!-- room-include-->
    <div class="room-include">
        <h2>Что входит</h2>
        <div class="row">
            <?
            $inc_col = count($arResult["PROPERTIES"]["INCLUDE"]["DATA"]);
            $inc_half = ceil($inc_col / 2);
            foreach($arResult["PROPERTIES"]["INCLUDE"]["DATA"] as $key=>$arInc):?>
                <?if($key==0 || $key==$inc_half):?>
                <div class="col-xs-6">
                    <ul class="room-include__list">
                <?endif;?>
                        <li style="background-image: url('<?=$arInc["PREVIEW_PICTURE"]?>')" class="room-include__item"><?=$arInc["NAME"]?></li>
                <?if($key==($inc_half-1) || $key==$inc_col-1):?>
                    </ul>
                </div>
                <?endif;?>
            <?endforeach;?>
        </div>
    </div>
    <!--end room-include-->
    <?endif;?>
    <?if($arResult["PROPERTIES"]["OTHER_ROOMS"]["DATA"]):?>
    <!--others-rooms-->
    <div class="others-rooms">
        <h2>Другие номера</h2>
        <div class="others-rooms-list">
            <?foreach($arResult["PROPERTIES"]["OTHER_ROOMS"]["DATA"] as $key=>$arRooms):
                if($key<3):
				$reserv = "/reserv-".$arRooms['CODE']."/";?>
            <div class="room room_size_2">
                <a href="<?=$arRooms["DETAIL_PAGE_URL"]?>" class="room__img" style="background-image: url('<?=$arRooms["PREVIEW_PICTURE"]?>'); background-size: cover; background-position: center center;"></a>
                <div class="room__ttl"><?=$arRooms["NAME"]?></div>
                <a href="<?=$arRooms["DETAIL_PAGE_URL"]?>" class="room__hover">
                    <div class="room__hover-ttl"><?=$arRooms["NAME"]?></div>
                    <div class="room__hover-text"><?=$arRooms["PREVIEW_TEXT"]?></div>
                </a>
                <a href="<?=$reserv?>" class="room__hover-link">Забронировать</a>
            </div>
            <?
            endif;
            endforeach;?>
        </div>
    </div>
    <!-- end other-rooms-->
    <?endif;?>
</div>
<!--end room-content-->