<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Industries');
if(isset($_REQUEST['ELEMENT_CODE'])):
    $APPLICATION->SetPageProperty('page_title', 'Industries');
    $APPLICATION->IncludeComponent("bitrix:news.detail","depth",Array(
      "IBLOCK_ID"     => 30,
      "ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
      "CHECK_DATES"   => "N",
      "IBLOCK_TYPE"   => "content_en",
      "DETAIL_URL"     => "/en/works/industries/#ELEMENT_CODE#/",
      "SET_TITLE"     => "Y",
      "CACHE_TYPE"    => "A",
      "FIELD_CODE"    => array("PREVIEW_PICTURE"),
      "PROPERTY_CODE" => array('ICON'),
    
    ));
else:
  LocalRedirect("/works/industries/");
endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>