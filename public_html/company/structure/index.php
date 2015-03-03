<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Структура холдинга');
?> 
<?
      $APPLICATION->IncludeComponent("bitrix:news.list", "structure", 
        array(
          "IBLOCK_ID"      => 7,
          "NEWS_COUNT"     => "100",
          "SORT_BY1"       => "SORT",
          "SORT_ORDER1"    => "ASC",
          "DETAIL_URL"     => "/company/",
          "CACHE_TYPE"     => "A",
          "SET_TITLE"      => "N"
        ),
        false
      );
?>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>