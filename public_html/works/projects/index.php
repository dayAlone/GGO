<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Ключевые проекты');
$APPLICATION->SetPageProperty('hide_projects', true);
$APPLICATION->SetPageProperty('body_class', 'short_title');
if(isset($_REQUEST['ELEMENT_CODE'])):
    $APPLICATION->IncludeComponent("bitrix:news.detail","projects",Array(
      "IBLOCK_ID"     => 2,
      "ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
      "CHECK_DATES"   => "N",
      "IBLOCK_TYPE"   => "content",
      "SET_TITLE"     => "Y",
      "CACHE_TYPE"    => "A",
      "FIELD_CODE"    => array("PREVIEW_PICTURE"),
      "PROPERTY_CODE" => array('CUSTOMER', 'WORKTYPE', 'TIME', 'TECH', 'PERFOMANCE', 'PROJECTS', 'TECH_ELEMENTS'),
    
    ));
else:
	LocalRedirect("/works/");
endif;
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>