<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Референс');
$APPLICATION->IncludeComponent("bitrix:news.list", "reference", 
		array(
		  "IBLOCK_ID"      => 15,
		  "NEWS_COUNT"     => "6123123123123",
		  "SORT_BY1"       => "IBLOCK_SECTION_ID",
		  "SORT_ORDER1"    => "ASC",
		  "SORT_BY2"       => "SORT",
		  "SORT_ORDER2"    => "ASC",
		  "DETAIL_URL"     => "/",
		  "CACHE_TYPE"     => "A",
		  "SET_TITLE"      => "N",
		  "PROPERTY_CODE" => array("INFORMATION")
		),
		false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>