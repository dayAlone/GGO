<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Home');
$APPLICATION->SetPageProperty('body_class', 'index')
?> 
<?
  $APPLICATION->IncludeComponent("bitrix:news.list", "slider", 
    array(
      "IBLOCK_ID"      => 23,
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
  	Company <br>Fact Sheet<br>
  	<?=svg('steps-arrow')?>
  </a>
</div>
<div class="sections">
  <div class="container center">
    <h1 class="m-padding-bottom">We work across the following industry sectors:</h1>
    <?
      $APPLICATION->IncludeComponent("bitrix:news.list", "depth", 
        array(
          "IBLOCK_ID"      => 30,
          "NEWS_COUNT"     => "10",
          "SORT_BY1"       => "SORT",
          "SORT_ORDER1"    => "ASC",
          "DETAIL_URL"     => "/en/works/industries/#ELEMENT_CODE#/",
          "CACHE_TYPE"     => "A",
          "SET_TITLE"      => "N",
          "PROPERTY_CODE"  => array('SVG'),
          "DISPLAY_BOTTOM_PAGER" => "N"
        ),
        false
      );
    ?>
    
    <div class="page__divider xxl-margin-top-sm"></div>
    <div class="xs-padding-top"><a href="/en/works/industries/index.php" class="more"><?=svg('steps-arrow')?><br>Read more</a></div>
  </div>
</div>
<div class="numbers">
  <div class="container center">
    <h1 class="m-padding-bottom">Giprogazoochistka in figures</h1>
    <div class="page__divider xxl-margin-top xxl-margin-bottom"></div>
    <div class="row">
      <div class="col-sm-6 col-md-4"><span>Already</span>
        <div class="number__value">86</div>
        <div class="page__divider page__divider--small float-none"></div><br>years of successful operation  in Russia<br> and across the world 
      </div>
      <div class="visible-xs page__divider xxl-margin-top xxl-margin-bottom float-left"></div>
      <div class="col-sm-6 col-md-4"><span>Over</span>
        <div class="number__value">4 000</div>
        <div class="page__divider page__divider--small float-none"></div><br>facilities put into operation 
      </div>
      <div class="visible-xs visible-sm page__divider xxl-margin-top xxl-margin-bottom float-left"></div>
      <div class="col-sm-6 col-md-4"><span>Over</span>
        <div class="number__value">2 million</div>
        <div class="page__divider page__divider--small float-none"></div><br>man-hours of engineering services annually provided to the Clients 
      </div>

      <div class="hidden-sm page__divider xxl-margin-top xxl-margin-bottom float-left"></div>
      <div class="col-sm-6 col-md-4"><span>Over</span>
        <div class="number__value">1 million </div>
        <div class="page__divider page__divider--small float-none"></div><br>kilometers of pipelines have been designed using 3D engineering systems 
      </div>

      <div class="visible-xs visible-sm page__divider xxl-margin-top xxl-margin-bottom float-left"></div>
      <div class="col-sm-6 col-md-4"><span>We have supplied over</span>
        <div class="number__value">3 000</div>
        <div class="page__divider page__divider--small float-none"></div><br>tons of process equipment have been procured and supplied to the Clients in the past 3 years 
      </div>
      <div class="visible-xs page__divider xxl-margin-top xxl-margin-bottom float-left"></div>
      <div class="col-sm-6 col-md-4"><span>Our process units produce over</span>
        <div class="number__value"> 10 million  </div>
        <div class="page__divider page__divider--small float-none"></div><br>tons of finished product 
      </div>
    </div>
    <div class="page__divider xxl-margin-top xxs-margin-bottom-xs xxl-margin-bottom-sm"></div>
    <div class="m-padding-top"><a href="/en/company/numbers/" class="more"><?=svg('steps-arrow')?><br>Read more</a></div>
  </div>
</div>
<div class="map">
  <div class="container center">
    <div class="map__content">
      <h1 class="m-padding-bottom">Map of projects </h1>
      <div class="map__text">
        <div class="xs-margin-bottom">Over </div>
        <div class="number__value">4000</div>facilities have been put into operation <br>
        <div class="page__divider page__divider--small"></div><br>in
        <div class="number__value">16</div>countries across the globe 
      </div><a href="/en/works/index.php" class="more"><?=svg('steps-arrow')?><br>Read more</a>
    </div>
  </div>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>