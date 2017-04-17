<?
foreach($arResult["PROPERTIES"]["IMG"]["VALUE"] as $arImg){
	$arResult["PROPERTIES"]["IMG"]["LINKS"][] = CFile::GetPath($arImg);
}

foreach($arResult["PROPERTIES"]["INCLUDE"]["VALUE"] as $key=>$arInclude){
	$res = CIBlockElement::GetByID($arInclude);
	if($ar_res = $res->GetNext()){
		$arResult["PROPERTIES"]["INCLUDE"]["DATA"][$key]["NAME"] = $ar_res["NAME"];
		$arResult["PROPERTIES"]["INCLUDE"]["DATA"][$key]["PREVIEW_PICTURE"] = CFile::GetPath($ar_res["PREVIEW_PICTURE"]);
	}
}

foreach($arResult["PROPERTIES"]["OTHER_ROOMS"]["VALUE"] as $key=>$arInclude){
	$res = CIBlockElement::GetByID($arInclude);
	if($ar_res = $res->GetNext()){
		$arResult["PROPERTIES"]["OTHER_ROOMS"]["DATA"][$key]["NAME"] = $ar_res["NAME"];
		$arResult["PROPERTIES"]["OTHER_ROOMS"]["DATA"][$key]["CODE"] = $ar_res["CODE"];
		$arResult["PROPERTIES"]["OTHER_ROOMS"]["DATA"][$key]["DETAIL_PAGE_URL"] = $ar_res["DETAIL_PAGE_URL"];
		$arResult["PROPERTIES"]["OTHER_ROOMS"]["DATA"][$key]["PREVIEW_PICTURE"] = CFile::GetPath($ar_res["PREVIEW_PICTURE"]);
		$arResult["PROPERTIES"]["OTHER_ROOMS"]["DATA"][$key]["PREVIEW_TEXT"] = $ar_res["PREVIEW_TEXT"];
	}
}