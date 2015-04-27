<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Key projects');
$APPLICATION->SetPageProperty('hide_projects', true);
$APPLICATION->SetPageProperty('body_class', 'short_title');
$APPLICATION->SetPageProperty('section', array('IBLOCK' => 21));
require($_SERVER['DOCUMENT_ROOT'].'/include/section.php');
if(isset($_REQUEST['ELEMENT_CODE'])):
  if(intval($_GLOBALS['currentCatalogSection'])>0):
    $APPLICATION->IncludeComponent("bitrix:news.list", "projects_description", 
      array(
        "IBLOCK_ID"            => 21,
        "NEWS_COUNT"           => "100",
        "SORT_BY1"             => "SORT",
        "SORT_ORDER1"          => "ASC",
        "DETAIL_URL"           => "/en/works/projects/#ELEMENT_CODE#/",
        "CACHE_TYPE"           => "A",
        "SET_TITLE"            => "N",
        "BIG"           => "Y",
        "PARENT_SECTION"       => $_GLOBALS['currentCatalogSection'],
        "PROPERTY_CODE"         => array('CUSTOMER', 'WORKTYPE', 'TIME', 'TECH', 'PERFOMANCE', 'PROJECTS', 'TECH_ELEMENTS'),
        "DISPLAY_BOTTOM_PAGER" => "N"
      ),
      false
    );
  else:
    $APPLICATION->IncludeComponent("bitrix:news.detail", "projects", Array(
      "IBLOCK_ID"     => 21,
      "ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
      "CHECK_DATES"   => "N",
      "IBLOCK_TYPE"   => "content",
      "SET_TITLE"     => "Y",

      "CACHE_TYPE"    => "A",
      "FIELD_CODE"    => array("PREVIEW_PICTURE"),
      "PROPERTY_CODE" => array('CUSTOMER', 'WORKTYPE', 'TIME', 'TECH', 'PERFOMANCE', 'PROJECTS', 'TECH_ELEMENTS', 'TITLE'),
    
    ));
  endif;
else:
	LocalRedirect("/works/");
endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>