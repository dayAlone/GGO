<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Key projects");
$APPLICATION->SetPageProperty('page_title', 'What we do');
$APPLICATION->SetPageProperty('hide_projects', true);
?>
<?
$APPLICATION->IncludeComponent("bitrix:news.list", "projects", 
array(
  "IBLOCK_ID"      => 2,
  "NEWS_COUNT"     => "100",
  "SORT_BY1"       => "SORT",
  "SORT_ORDER1"    => "ASC",
  "DETAIL_URL"     => "/works/projects/#ELEMENT_CODE#/",
  "CACHE_TYPE"     => "A",
  "noSections"    => "Y",
  "SET_TITLE"      => "N",
  "BIG" => "Y",
  "DISPLAY_BOTTOM_PAGER" => "N"

),
false
);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>