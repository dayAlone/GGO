<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Our history');
?> 
<?
      $APPLICATION->IncludeComponent("bitrix:news.list", "history", 
        array(
          "IBLOCK_ID"      => 29,
          "NEWS_COUNT"     => "100",
          "SORT_BY1"       => "NAME",
          "SORT_ORDER1"    => "DESC",
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