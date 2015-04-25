<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Map of projects");?>
<p>The map shows some of the projects completed since 1990. For a complete list of projects, go to the <a href="/en/works/reference/">Reference List page</a>.</p>
<?
global $arMaps;
$arMaps = array("!PROPERTY_COORDS"=>false);
$APPLICATION->IncludeComponent("bitrix:news.list", "map", 
	array(
	  "IBLOCK_ID"      => 21,
	  "NEWS_COUNT"     => "100000",
	  "SORT_BY1"       => "SORT",
	  "FILTER_NAME"    => "arMaps",
	  "SORT_ORDER1"    => "ASC",
	  "DETAIL_URL"     => "/en/works/projects/#ELEMENT_CODE#/",
	  "CACHE_TYPE"     => "A",
	  "SET_TITLE"      => "N",
	  "PROPERTY_CODE"  => array("COORDS")
	),
	false
);
$APPLICATION->IncludeComponent("bitrix:news.list", "reference_map", 
		array(
		  "IBLOCK_ID"      => 26,
		  "NEWS_COUNT"     => "6123123123123",
		  "SORT_BY1"       => "IBLOCK_SECTION_ID",
		  "SORT_ORDER1"    => "ASC",
		  "SORT_BY2"       => "SORT",
		  "SORT_ORDER2"    => "ASC",
		  "DETAIL_URL"     => "/en/works/reference/#ELEMENT_ID#/",
		  "CACHE_TYPE"     => "A",
		  "SET_TITLE"      => "N",
		  "PROPERTY_CODE" => array("INFORMATION")
		),
		false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>