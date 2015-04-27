<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetPageProperty('section', array('IBLOCK'=>20, 'CODE'=>'news', "NOEMPTY"=>true));
require($_SERVER['DOCUMENT_ROOT'].'/include/section.php');
$APPLICATION->SetTitle('Press center');
if(!isset($_REQUEST['ELEMENT_CODE'])||intval($_GLOBALS['currentCatalogSection'])>0):
    $APPLICATION->SetTitle('Press center');
    $APPLICATION->IncludeComponent("bitrix:news.list", "news", 
	array(
		"IBLOCK_ID"            => 20,
		"NEWS_COUNT"           => "20",
		"SORT_BY1"             => "ACTIVE_FROM",
		"SORT_ORDER1"          => "DESC",
		"DETAIL_URL"           => "/en/press/news/#ELEMENT_CODE#/",
		"CACHE_TYPE"           => "A",
		"SET_TITLE"            => "N",
		"SHOW_DESCRIPTION"     => "Y",
		"DISPLAY_BOTTOM_PAGER" => "Y",
		"SHOW_YEARS"           => "Y",
		"PARENT_SECTION"       => $_GLOBALS['currentCatalogSection'],
	),
	false
	);
  else:
    $APPLICATION->SetPageProperty('page_title', 'Press center');
    $APPLICATION->IncludeComponent("bitrix:news.detail","detail",Array(
      "IBLOCK_ID"     => 20,
      "ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
      "CHECK_DATES"   => "N",
      "IBLOCK_TYPE"   => "content_en",
      "SET_TITLE"     => "Y",
      "CACHE_TYPE"    => "A",
      "PROPERTY_CODE" => array("GALLERY"),
    
    ));
  endif;

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>