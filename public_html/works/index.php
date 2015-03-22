<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Ключевые проекты");
$APPLICATION->SetPageProperty('page_title', 'Деятельность');
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
  "DISPLAY_BOTTOM_PAGER" => "N"
),
false
);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>