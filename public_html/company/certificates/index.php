<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Сертификаты и свидетельства');

      $APPLICATION->IncludeComponent("bitrix:news.list", "certificates", 
        array(
          "IBLOCK_ID"      => 9,
          "NEWS_COUNT"     => "100",
          "SORT_BY1"       => "NAME",
          "SORT_ORDER1"    => "DESC",
          "DETAIL_URL"     => "/company/",
          "CACHE_TYPE"     => "A",
          "SET_TITLE"      => "N",
          "PROPERTY_CODE"  => array('IMAGES'),
          "PARENT_SECTION_CODE"   => "certificates"
        ),
        false
      );

require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>