<?
foreach($arResult["ITEMS"] as &$arItem){
	if(count($arItem["DISPLAY_PROPERTIES"]["FILE"]["VALUE"])==1){
		$file = $arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"];
		unset($arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"]);
		$arItem["DISPLAY_PROPERTIES"]["FILE"]["FILE_VALUE"][] = $file;
	}

	if(count($arItem["DISPLAY_PROPERTIES"]["IMG"]["VALUE"])==1){
		$slide = $arItem["DISPLAY_PROPERTIES"]["IMG"]["FILE_VALUE"];
		unset($arItem["DISPLAY_PROPERTIES"]["IMG"]["FILE_VALUE"]);
		$arItem["DISPLAY_PROPERTIES"]["IMG"]["FILE_VALUE"][] = $slide;
	}
}