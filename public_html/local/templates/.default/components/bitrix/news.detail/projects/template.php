<?
$item = $arResult;
?>
<div class="project__detail">
  
  <div class="row">
    <div class="col-sm-8">
      <? foreach(array('CUSTOMER') as $prop):
        if(strlen($item['PROPERTIES'][$prop]['VALUE']['TEXT'])>0):
        ?>
        <h4><?=$item['PROPERTIES'][$prop]['NAME']?></h4>
          <p><?=html_entity_decode($item['PROPERTIES'][$prop]['VALUE']['TEXT'])?></p>
        <? 
        endif;
      endforeach;?>
      <div class="project__divider"></div>
      <div class="row">
        <? foreach(array('WORKTYPE', 'TIME') as $key=>$prop):
      		if(strlen($item['PROPERTIES'][$prop]['VALUE']['TEXT'])>0):
      		?>
          <div class="col-sm-<?=($key==0?8:4)?>">
        		<h4><?=$item['PROPERTIES'][$prop]['NAME']?></h4>
          	<p><?=html_entity_decode($item['PROPERTIES'][$prop]['VALUE']['TEXT'])?></p>
          </div>
      		<? 
      		endif;
      	endforeach;?>
      </div>
      <?if($item['PROPERTIES']['TABLE']['VALUE']):?>
      <div class="project__divider project__divider--width"></div>
        <h5>Показатели</h5>
      <?endif;?>
    </div>
    <div class="col-xs-4 right">
    	<?if(strlen($item['PREVIEW_PICTURE']['SRC'])>0):?>
      <div class="project__picture" style="background-image:url(<?=$item['PREVIEW_PICTURE']['SRC']?>)"></div>
    	<?endif;?>
    </div>
  </div>
  <?if($item['PROPERTIES']['TABLE']['VALUE']):?>
  <div class="project__table">
    <div class="row project__table-title">
      <div class="col-xs-4">Технологии проекта</div>
      <div class="col-xs-4">Производительность</div>
      <div class="col-xs-4">Основные технологические показатели</div>
    </div>
    <? foreach($item['PROPERTIES']['TABLE']['VALUE'] as $row):?>
      <?if(strlen($row['t0'])>0):?>
        <div class="project__divider project__divider--blue"></div>
        <?else:?>
        <div class="row"><div class="col-xs-8 col-xs-offset-4"><div class="project__divider"></div></div></div>
      <?endif;?>
      <div class="row">
        <div class="col-xs-4"><?=$row['t0']?></div>
        <div class="col-xs-4 project__cell--grey"><?=$row['t1']?></div>
        <div class="col-xs-4 project__cell--grey"><?=$row['t2']?></div>
      </div>
    <?endforeach;?>
    <div class="project__divider project__divider--blue"></div>
  </div>
  <?endif;?>
  <div class="page__divider page__divider--small"></div>
    <h3>Особенности проекта</h3>
  	<?=$item["~DETAIL_TEXT"]?>

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
<a href="/works/projects/" class="back"><?=svg('back')?> К списку проектов</a>