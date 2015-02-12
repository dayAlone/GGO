<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Научно-технические публикации');
$APPLICATION->SetPageProperty('section', array('IBLOCK'=>10, 'CODE'=>'publications', "NOEMPTY"=>true));
require($_SERVER['DOCUMENT_ROOT'].'/include/section.php');
$APPLICATION->IncludeComponent("bitrix:news.list", "news", 
	array(
		"IBLOCK_ID"            => 10,
		"NEWS_COUNT"           => "20",
		"SORT_BY1"             => "ACTIVE_FROM",
		"SORT_ORDER1"          => "DESC",
		"DETAIL_URL"           => "/press/news/#ELEMENT_CODE#/",
		"CACHE_TYPE"           => "A",
		"SET_TITLE"            => "N",
		"SHOW_DESCRIPTION"     => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"SHOW_YEARS"           => "Y",
		"PROPERTY_CODE"        => array("FILE"),
		"PARENT_SECTION"       => $_GLOBALS['currentCatalogSection'],
	),
	false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>