<?
foreach($arResult["PROPERTIES"]["IMG"]["VALUE"] as $arImg){
	$arResult["PROPERTIES"]["IMG"]["LINKS"][] = CFile::GetPath($arImg);
}