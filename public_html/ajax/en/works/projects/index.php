<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
$APPLICATION->IncludeComponent("bitrix:news.detail","map",Array(
  "IBLOCK_ID"     => 21,
  "ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
  "CHECK_DATES"   => "N",
  "IBLOCK_TYPE"   => "content",
  "SET_TITLE"     => "N",
  "PROPERTY_CODE" => array('CUSTOMER', 'WORKTYPE', 'TIME', 'TECH', 'PERFOMANCE', 'PROJECTS', 'TECH_ELEMENTS'),
  "CACHE_TYPE"    => "A",
));
?>