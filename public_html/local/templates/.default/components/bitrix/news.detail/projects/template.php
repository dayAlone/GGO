<?
$item = $arResult;
?>
<div class="project__detail">
  <div class="row">
    <div class="col-xs-5">
    	<? foreach(array('CUSTOMER', 'WORKTYPE') as $prop):
    		if(strlen($item['PROPERTIES'][$prop]['VALUE']['TEXT'])>0):
    		?>
    		<h4><?=$item['PROPERTIES'][$prop]['NAME']?></h4>
      		<p><?=html_entity_decode($item['PROPERTIES'][$prop]['VALUE']['TEXT'])?></p>
    		<? 
    		endif;
    	endforeach;?>
    </div>
    <div class="col-xs-3">
      <? foreach(array('TIME', 'TECH', 'PERFOMANCE') as $prop):
    		if(strlen($item['PROPERTIES'][$prop]['VALUE']['TEXT'])>0):
    		?>
    		<h4><?=$item['PROPERTIES'][$prop]['NAME']?></h4>
      		<p><?=html_entity_decode($item['PROPERTIES'][$prop]['VALUE']['TEXT'])?></p>
    		<? 
    		endif;
    	endforeach;?>
    </div>
    <div class="col-xs-4 right">
    	<?if(strlen($item['PREVIEW_PICTURE']['SRC'])>0):?>
    	<img src="<?=$item['PREVIEW_PICTURE']['SRC']?>" class="max-width">
    	<?endif;?>
    </div>
  </div>
  <div class="page__divider page__divider--small"></div>
  	<?=$item["~DETAIL_TEXT"]?>

  <?if(count($item['PROPERTIES']['DEPTH']['VALUE'])>0):?>
  <div class="page__divider page__divider--small"></div>
  <h3>Технологии, использованные в проекте</h3>
  <div class="row">
    <div class="col-xs-4">
      <h4 class="page__title page__title--small-icon"><svg width="100" height="100" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg"><g id="Page-1" fill="none" fill-rule="evenodd"><g id="i-3" fill="#0082DC"><path d="M50.19 99.662C22.804 99.662.525 77.384.525 50S22.806.338 50.19.338C77.57.338 99.85 22.616 99.85 50S77.573 99.662 50.19 99.662zm0-97.297C23.92 2.365 2.552 23.735 2.552 50c0 26.266 21.37 47.635 47.636 47.635 26.265 0 47.634-21.37 47.634-47.635 0-26.266-21.37-47.635-47.635-47.635z" id="Fill-1"></path><path d="M49.2 18.918c-2.464 8.403-6.303 14.28-9.838 19.68-2.208 3.377-4.303 6.57-5.856 10.114-1.553 3.543-2.548 7.44-2.546 12.137.006 4.984 1.957 10.17 5.32 14.166 1.685 1.995 3.728 3.692 6.07 4.893 2.344 1.2 4.99 1.9 7.84 1.9 2.776 0 5.382-.703 7.707-1.905 3.49-1.805 6.357-4.715 8.363-8.09 2.004-3.376 3.154-7.226 3.156-10.966.003-4.685-.997-8.582-2.56-12.126-1.56-3.547-3.663-6.746-5.882-10.13-3.55-5.413-7.408-11.3-9.828-19.672-.124-.433-.522-.732-.972-.733-.45 0-.848.296-.974.728 0 0 .948 3.6 1.484 5.005 2.45 6.423 5.683 11.344 8.594 15.782 2.223 3.386 4.256 6.496 5.724 9.835 1.468 3.342 2.385 6.91 2.387 11.31.005 4.427-1.854 9.218-4.956 12.846-1.55 1.815-3.4 3.34-5.467 4.408-2.067 1.067-4.344 1.68-6.778 1.68-2.52 0-4.835-.614-6.914-1.68-3.117-1.595-5.698-4.222-7.494-7.307-1.796-3.08-2.796-6.61-2.795-9.948.003-4.414.916-7.985 2.376-11.324 1.46-3.338 3.484-6.44 5.696-9.82 3.53-5.397 6.603-10.12 9.13-17.237-.362-1.236-.99-3.552-.99-3.552z" id="Fill-2"></path><path d="M53.56 74.565c-.5 0-.943-.352-1.04-.86-.11-.577.267-1.133.842-1.242 3.856-.74 5.58-4.635 5.58-8.172 0-.583.478-1.058 1.063-1.058.586 0 1.06.475 1.06 1.06 0 4.41-2.258 9.288-7.304 10.255-.066.013-.133.018-.2.018" id="Fill-3"></path></g></g></svg>Нефтедобыча
      </h4>
      <ul class="sections sections--small">
        <li><a href="#" class="sections__item">Производство серы по технологии Smartsulf</a></li>
      </ul>
    </div>
  </div>
  <?endif;?>
  <?if(count($item['PROPERTIES']['PROJECTS']['VALUE'])>0&&$item['PROPERTIES']['PROJECTS']['VALUE']):?>
  <div class="page__divider page__divider--small"></div>
  <h3 class="l-margin-bottom">Проекты с аналогичными технологиями</h3>
  <?
  	global $projectFilter;
  	$projectFilter = array('ID'=>$item['PROPERTIES']['PROJECTS']['VALUE']);
  	$APPLICATION->IncludeComponent("bitrix:news.list", "projects", 
		array(
		  "IBLOCK_ID"      => 2,
		  "NEWS_COUNT"     => "6",
		  "FILTER_NAME"    => "projectFilter",
		  "SORT_BY1"       => "SORT",
		  "SORT_ORDER1"    => "ASC",
		  "DETAIL_URL"     => "/works/projects/#ELEMENT_CODE#/",
		  "CACHE_TYPE"     => "A",
		  "SET_TITLE"      => "N",
		  "DISPLAY_BOTTOM_PAGER" => "N"
		),
		false
		);
  ?>
  <?endif;?>
</div>