<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Фотогалерея');
$APPLICATION->IncludeComponent("bitrix:news.list", "gallery", 
    array(
      "IBLOCK_ID"      => 11,
      "NEWS_COUNT"     => "121300",
      "SORT_BY1"       => "SORT",
      "SORT_ORDER1"    => "ASC",
      "DETAIL_URL"     => "/company/",
      "CACHE_TYPE"     => "A",
      "SET_TITLE"      => "N",
      "PROPERTY_CODE"  => array('IMAGES')
    ),
    false
  );
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>