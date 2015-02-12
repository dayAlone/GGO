<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Виды деятельности');
if(isset($_REQUEST['ELEMENT_CODE'])):
    $APPLICATION->SetPageProperty('page_title', 'Виды деятельности');
    $APPLICATION->IncludeComponent("bitrix:news.detail","depth",Array(
      "IBLOCK_ID"     => 17,
      "ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
      "CHECK_DATES"   => "N",
      "IBLOCK_TYPE"   => "content",
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