<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->IncludeComponent("bitrix:news.detail","reference",Array(
  "IBLOCK_ID"     => 26,
  "ELEMENT_ID"  => $_REQUEST['ELEMENT_ID'],
  "CHECK_DATES"   => "N",
  "IBLOCK_TYPE"   => "content",
  "SET_TITLE"     => "N",
  "PROPERTY_CODE" => array('INFORMATION'),
  "CACHE_TYPE"    => "A",
  "CACHE_NOTES"    => $_REQUEST['ROW']
));
?>