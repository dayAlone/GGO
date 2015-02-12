<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Карта проектов');
$APPLICATION->IncludeComponent("bitrix:news.list", "map", 
	array(
	  "IBLOCK_ID"      => 2,
	  "NEWS_COUNT"     => "6123123123123",
	  "SORT_BY1"       => "SORT",
	  "SORT_ORDER1"    => "ASC",
	  "DETAIL_URL"     => "/works/projects/#ELEMENT_CODE#/",
	  "CACHE_TYPE"     => "A",
	  "SET_TITLE"      => "N",
	  "PROPERTY_CODE"  => array("COORDS")
	),
	false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>