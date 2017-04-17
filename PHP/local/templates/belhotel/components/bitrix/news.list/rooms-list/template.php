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
<div class="rooms-wrapper">
    <div class="rooms">
        <?foreach($arResult["ITEMS"] as $key=>$arItem):?>
            <?
            $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
            $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
            $reserv = "/reserv-".$arItem['CODE']."/";
            switch ($key) {
                case 0:
                case 5:
                    echo "<div class=\"room-wrapper room-wrapper-size1\">";
                    $cl = 1;
                    break;
                case 1:
                case 6:
                    $cl = 1;
                    break;
                case 2:
                    echo "<div class=\"room-wrapper room-wrapper-size2\">";
                    $cl = 2;
                    break;
                case 3:
                    $cl = 2;
                    break;
                case 4:
                    echo "<div class=\"room-wrapper room-wrapper-size4\">";
                    $cl = 4;
                    break;
            }
            ?>
                <div class="room room_size_<?=$cl?>" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="room__img" style="background-image: url('<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>'); background-size: cover; background-position: center center;"></a>
                    <div class="room__ttl"><?=$arItem["NAME"]?></div>
                    <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="room__hover">
                        <div class="room__hover-ttl"><?=$arItem["NAME"]?></div>
                        <div class="room__hover-text">
                            <?=$arItem["PREVIEW_TEXT"]?>
                        </div>
                    </a>
                    <a href="<?=$reserv?>" class="room__hover-link">Забронировать</a>
                </div>
            <?if($key==1 || $key==3 || $key==4 || $key==6):?>
                </div>
            <?endif;?>
        <?endforeach;?>
    </div>
</div>