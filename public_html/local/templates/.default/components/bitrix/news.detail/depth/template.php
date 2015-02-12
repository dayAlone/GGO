<?
$item = $arResult;
$item['ICON'] = file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['PROPERTIES']['SVG']['VALUE']));
?>
<h2 class="page__title page__title--icon"><?=$item['ICON']?><?=$item['NAME']?></h2>
<div class="row">
	<div class="col-xs-9">
		<?=$item['~DETAIL_TEXT']?>
		<div class="page__divider page__divider--small"></div>		
	</div>
	<div class="col-xs-3">
		<?if($item['IBLOCK_ID']==4):?>
		<h5>другие отрасли</h5>
		<?else:?>
		<h5>другие виды деятельности</h5>
		<?endif;?>
		<div class="page__divider xl-margin-bottom"></div>
		<?
			global $depthFilter;
			$depthFilter = array('!ID'=>$item['ID']);
			$APPLICATION->IncludeComponent("bitrix:news.list", "list", 
	        array(
	          "IBLOCK_ID"      => $item['IBLOCK_ID'],
	          "NEWS_COUNT"     => "100",
	          "FILTER_NAME"    => "depthFilter",
	          "SORT_BY1"       => "SORT",
	          "SORT_ORDER1"    => "ASC",
	          "DETAIL_URL"     => $arParams["DETAIL_URL"],
	          "CACHE_TYPE"     => "A",
	          "SET_TITLE"      => "N",
	          "PROPERTY_CODE"  => array('SVG')
	        ),
	        false
	      );
		?>
	</div>
</div>
<?if($item['IBLOCK_ID']==4):?>
<h3 class="l-margin-bottom">Проекты данной отрасли</h3>
<?else:?>
<h3 class="l-margin-bottom">Проекты данного вида деятальности</h3>
<?endif;?>
  <?
  	global $projectFilter;
  	$projectFilter = array('PROPERTY_INDUSTRIES'=>$item['ID']);
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
<p class="xs-margin-top"><a href="/works/">Все проекты</a></p>
