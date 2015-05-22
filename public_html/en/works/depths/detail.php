<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Services');
if(isset($_REQUEST['ELEMENT_CODE'])):
    $APPLICATION->SetPageProperty('page_title', 'Services');
    $APPLICATION->IncludeComponent("bitrix:news.detail","depth",Array(
      "IBLOCK_ID"     => 24,
      "ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
      "CHECK_DATES"   => "N",
      "IBLOCK_TYPE"   => "content_en",
      "SET_TITLE"     => "Y",
      "CACHE_TYPE"    => "A",
      "DETAIL_URL"     => "/en/works/depths/#ELEMENT_CODE#/",
      "FIELD_CODE"    => array("PREVIEW_PICTURE"),
      "PROPERTY_CODE" => array('ICON'),
      "CACHE_TIME"    => "3600",
    ));
else:
  LocalRedirect("/en/works/depth/");
endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>