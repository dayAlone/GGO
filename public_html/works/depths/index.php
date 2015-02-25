<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Услуги');
?> 
<p class="highlight">История нашей компании началась в 1928 году. Ключевую идею успеха, которая сопровождает нас на протяжении десятков лет, мы видим в приверженности к индивидуальному подходу к каждому из наших заказчиков. </p>
<?
      $APPLICATION->IncludeComponent("bitrix:news.list", "depth", 
        array(
          "IBLOCK_ID"      => 17,
          "NEWS_COUNT"     => "10",
          "SORT_BY1"       => "SORT",
          "SORT_ORDER1"    => "ASC",
          "DETAIL_URL"     => "/works/depths/#ELEMENT_CODE#/",
          "CACHE_TYPE"     => "A",
          "SET_TITLE"      => "N",
          "PROPERTY_CODE"  => array('SVG'),
          "DISPLAY_BOTTOM_PAGER" => "N"
        ),
        false
      );
    ?>
<div class="xxl-margin-top page__divider"></div>
<p class="bigger l-line-height xxl-margin-bottom">История нашей компании началась в 1928 году. Ключевую идею успеха, которая сопровождает нас на протяжении десятков лет, мы видим в приверженности к индивидуальному подходу к каждому из наших заказчиков. Сочетание накопленного опыта и умения решать персональные инжиниринговые задачи, мастерство поиска и созидания комплексных высокотехнологичных решений сформировали философию компании «Инжиниринг как искусство», которая находит отражение в каждом нашем проекте. В нашем референс-листе более 4 000 технологических установок. Мы реализуем инжиниринговые проекты полного цикла – от проектирования до введения в эксплуатацию оборудования для объектов нефтегазодобычи, нефтегазопереработки и нефтехимии.</p>

<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>