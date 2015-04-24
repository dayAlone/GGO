<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Карта проектов");?><p>На карте представлены некоторые проекты, выполненные после 1990 г. Полный список выполненных проектов вы найдете в разделе <a href="/works/reference/">Референс.</a></p>

<?
global $arMaps;
$arMaps = array("!PROPERTY_COORDS"=>false);
$APPLICATION->IncludeComponent("bitrix:news.list", "map", 
	array(
	  "IBLOCK_ID"      => 2,
	  "NEWS_COUNT"     => "100000",
	  "SORT_BY1"       => "SORT",
	  "FILTER_NAME"    => "arMaps",
	  "SORT_ORDER1"    => "ASC",
	  "DETAIL_URL"     => "/works/projects/#ELEMENT_CODE#/",
	  "CACHE_TYPE"     => "A",
	  "SET_TITLE"      => "N",
	  "PROPERTY_CODE"  => array("COORDS")
	),
	false
);
$APPLICATION->IncludeComponent("bitrix:news.list", "reference_map", 
		array(
		  "IBLOCK_ID"      => 15,
		  "NEWS_COUNT"     => "6123123123123",
		  "SORT_BY1"       => "IBLOCK_SECTION_ID",
		  "SORT_ORDER1"    => "ASC",
		  "SORT_BY2"       => "SORT",
		  "SORT_ORDER2"    => "ASC",
		  "DETAIL_URL"     => "/works/reference/#ELEMENT_ID#/",
		  "CACHE_TYPE"     => "A",
		  "SET_TITLE"      => "N",
		  "PROPERTY_CODE" => array("INFORMATION")
		),
		false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>