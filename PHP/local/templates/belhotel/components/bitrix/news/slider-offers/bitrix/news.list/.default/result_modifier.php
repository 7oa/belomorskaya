<?
foreach($arResult["ITEMS"] as &$arItem){
	$resize_img = CFile::ResizeImageGet($arItem["PREVIEW_PICTURE"]["ID"], Array("width" => "530", "height" => "400"), BX_RESIZE_IMAGE_EXACT, true);
	$arItem["PREVIEW_PICTURE"]["RESIZE"] = $resize_img["src"];
}