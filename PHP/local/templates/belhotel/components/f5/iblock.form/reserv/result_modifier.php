<?
$arSelect = Array("ID", "NAME", "PROPERTY_PRICE_1", "PROPERTY_PRICE_2", "PROPERTY_PRICE_KIDS");
$arFilter = Array("IBLOCK_ID"=>1, "ACTIVE_DATE"=>"Y", "CODE"=>$_GET["ELEMENT_CODE"], "ACTIVE"=>"Y");
$res = CIBlockElement::GetList(Array(), $arFilter, false, Array("nPageSize"=>50), $arSelect);
while($ob = $res->GetNextElement())
{
	$arFields = $ob->GetFields();
	$arResult["ROOM"] = $arFields;
}
