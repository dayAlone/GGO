<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Услуги");
?> 
<p class="highlight">ОАО «Гипрогазоочистка» - инжиниринговая компания, которая выполняет полный цикл работ 
и услуг для предприятий нефтегазодобывающей, нефтегазоперерабатывающей отраслей, нефтегазохимических и 
химических заводов, обеспечивая управление проектом на всех стадиях реализации.</p>
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
<p class="bigger l-line-height xxl-margin-bottom">Знания, опыт и компетенции компании распространяются на 
такие профессиональные области, как разработка и проектирование технологических установок различной 
сложности, автоматизация управления производством, подбор, комплектация и поставка оборудования и 
материалов, авторский надзор, управление строительством и пуско-наладочные работы.</p>

<p class="highlight">ОАО «Гипрогазоочистка» создает эффективные проекты на основе  проверенных технологий 
и отраслевого опыта, обеспечивая оптимальные решения «под ключ».</p>



<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>