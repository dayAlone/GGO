<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Истории успеха');
$APPLICATION->IncludeComponent("bitrix:news.list", "success", 
	array(
	  "IBLOCK_ID"      => 12,
	  "NEWS_COUNT"     => "100000",
	  "SORT_BY1"       => "SORT",
	  "SORT_ORDER1"    => "ASC",
	  "DETAIL_URL"     => "/",
	  "CACHE_TYPE"     => "A",
	  "SET_TITLE"      => "N",
	  "PROPERTY_CODE"  => array('ABOUT')
	),
false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>