<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Главная');
$APPLICATION->SetPageProperty('body_class', 'index')
?> 
<?
  $APPLICATION->IncludeComponent("bitrix:news.list", "slider", 
    array(
      "IBLOCK_ID"      => 5,
      "NEWS_COUNT"     => "10000000000",
      "SORT_BY1"       => "SORT",
      "SORT_ORDER1"    => "ASC",
      "CACHE_TYPE"     => "A",
      "SET_TITLE"      => "N",
      "PROPERTY_CODE"  => array('LINK', 'TARGET', 'INDUSTRY'),
    ),
    false
  );
?>

<div class="slider__frame">
  <a class="slider__down" href="#">
  	Ключевые сведения <br>о компании<br>
  	<?=svg('steps-arrow')?>
  </a>
</div>
<div class="sections">
  <div class="container center">
    <h1 class="m-padding-bottom">Мы осуществляем свою деятельность<br>в следующих отраслях:</h1>
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
    
    <div class="page__divider xxl-margin-top"></div>
    <div class="xs-padding-top"><a href="#" class="more"><?=svg('steps-arrow')?><br>Подробнее</a></div>
  </div>
</div>
<div class="numbers">
  <div class="container center">
    <h1 class="m-padding-bottom">Гопрогазоочистка в цифрах</h1>
    <div class="page__divider xxl-margin-top xxl-margin-bottom"></div>
    <div class="row">
      <div class="col-xs-4"><span>Уже</span>
        <div class="number__value">86</div>
        <div class="page__divider page__divider--small float-none"></div><br>лет успешной работы <br> в России и по всему миру
      </div>
      <div class="col-xs-4"><span>Более</span>
        <div class="number__value">4 000</div>
        <div class="page__divider page__divider--small float-none"></div><br>выполненных проектов<br> со дня основания
      </div>
      <div class="col-xs-4"><span>Объем предоставляемых услуг</span>
        <div class="number__value">2 млн.</div>
        <div class="page__divider page__divider--small float-none"></div><br>человеко-часов в год
      </div>
    </div>
    <div class="page__divider xxl-margin-top xxl-margin-bottom"></div>
    <div class="row">
      <div class="col-xs-4"><span>Наши установки производят</span>
        <div class="number__value">1,5 млн</div>
        <div class="page__divider page__divider--small float-none"></div><br>тонн серы в год
      </div>
      <div class="col-xs-4"><span>Более</span>
        <div class="number__value">3 000</div>
        <div class="page__divider page__divider--small float-none"></div><br>тонн оборудования поставлено <br> нами за последние 3 года
      </div>
      <div class="col-xs-4"><span>Более чем на</span>
        <div class="number__value">60</div>
        <div class="page__divider page__divider--small float-none"></div><br>нефтегазовых объектах нами<br> проведены пуско-наладочные<br>работы
      </div>
    </div>
    <div class="page__divider xxl-margin-top xxl-margin-bottom"></div>
    <div class="m-padding-top"><a href="#" class="more"><?=svg('steps-arrow')?><br>Подробнее</a></div>
  </div>
</div>
<div class="map">
  <div class="container center">
    <div class="map__content">
      <h1 class="m-padding-bottom">Карта проектов</h1>
      <div class="map__text">
        <div class="xs-margin-bottom">Более</div>
        <div class="number__value">4000</div>технологических установок<br>
        <div class="page__divider page__divider--small"></div><br>в
        <div class="number__value">16</div>странах мира
      </div><a href="#" class="more"><?=svg('steps-arrow')?><br>Подробнее</a>
    </div>
  </div>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>