<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$curDir = $APPLICATION->GetCurDir();
$rest = substr($curDir, 1, 11);

?>
<div class="header-menu-wrapper">
    <?if (!empty($arResult)):?>
        <ul class="header-menu">
            <?
            foreach($arResult as &$arItem):
                if($arItem["TEXT"]=="Информация" && $rest=="information") $arItem["SELECTED"]=1;
                if($arParams["MAX_LEVEL"] == 1 && $arItem["DEPTH_LEVEL"] > 1)
                    continue;
                    $class = "";
                    if($arItem["SELECTED"]) $class=" header-menu__links_active";
            ?>
                <li class="header-menu__items"><a href="<?=$arItem["LINK"]?>" title="<?=$arItem["TEXT"]?>" class="header-menu__links<?=$class?>"><?=$arItem["TEXT"]?></a></li>
            <?endforeach;?>
        </ul>
    <?endif?>
</div>