<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Технологии');
?> 
<p class="highlight">История нашей компании началась в 1928 году. Ключевую идею успеха, которая сопровождает нас на протяжении десятков лет, мы видим в приверженности к индивидуальному подходу к каждому из наших заказчиков. </p>
<?
$APPLICATION->IncludeComponent("bitrix:news.list", "tech", 
	array(
	  "IBLOCK_ID"      => 18,
	  "NEWS_COUNT"     => "6123123123123",
	  "SORT_BY1"       => "IBLOCK_SECTION_ID",
	  "SORT_ORDER1"    => "ASC",
	  "SORT_BY2"       => "SORT",
	  "SORT_ORDER2"    => "ASC",
	  "DETAIL_URL"     => "/works/technologies/#ELEMENT_CODE#/",
	  "CACHE_TYPE"     => "A",
	  "FIELD_CODE"     => array("DETAIL_TEXT"),
	  "SET_TITLE"      => "N",
	),
	false
);
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>