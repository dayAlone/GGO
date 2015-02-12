<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Ключевые проекты');
$APPLICATION->SetPageProperty('page_title', 'Деятельность');
?>
<p class="highlight xxl-margin-bottom">История нашей компании началась в 1928 году. Ключевую идею успеха, которая сопровождает нас на протяжении десятков лет, мы видим в приверженности к индивидуальному подходу к каждому из наших заказчиков. </p>
<?
$APPLICATION->IncludeComponent("bitrix:news.list", "projects", 
array(
  "IBLOCK_ID"      => 2,
  "NEWS_COUNT"     => "6",
  "SORT_BY1"       => "SORT",
  "SORT_ORDER1"    => "ASC",
  "DETAIL_URL"     => "/works/projects/#ELEMENT_CODE#/",
  "CACHE_TYPE"     => "A",
  "SET_TITLE"      => "N",
  "DISPLAY_BOTTOM_PAGER" => "N"
),
false
);

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>