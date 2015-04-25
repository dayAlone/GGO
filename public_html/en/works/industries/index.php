<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Industries");
?> 
<p class="highlight">ОАО «Гипрогазоочистка» - инжиниринговая компания, которая работает для ключевых 
отраслей промышленности и реализует проекты от проектирования до введения в эксплуатацию технологических 
установок.</p>
<?
      $APPLICATION->IncludeComponent("bitrix:news.list", "depth", 
        array(
          "IBLOCK_ID"      => 4,
          "NEWS_COUNT"     => "10",
          "SORT_BY1"       => "SORT",
          "SORT_ORDER1"    => "ASC",
          "DETAIL_URL"     => "/works/industries/#ELEMENT_CODE#/",
          "CACHE_TYPE"     => "A",
          "SET_TITLE"      => "N",
          "PROPERTY_CODE"  => array('SVG'),
          "DISPLAY_BOTTOM_PAGER" => "N"
        ),
        false
      );
    ?>
<div class="xxl-margin-top page__divider"></div>

<p class="bigger l-line-height xxl-margin-bottom">
Компания активно взаимодействует с ведущими отечественными и зарубежными партнерами, используя лучшие из 
существующих технологий, а также применяет собственные разработки.</p>
<p class="highlight">ОАО «Гипрогазоочистка» создает эффективные проекты на основе лучших технологий и 
отраслевого опыта, обеспечивая оптимальные решения «под ключ».</p> 
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>