<?
$item = $arResult;
$item['ICON'] = file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($item['PROPERTIES']['SVG']['VALUE']));
if(strlen($item['ICON'])==0):
	$arFilter = array('IBLOCK_ID' => $arResult['IBLOCK_ID'], 'ID'=>$item['IBLOCK_SECTION_ID']);
	$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'), $arFilter, false, array('UF_SVG'));
   	while ($arSect = $rsSect->Fetch()) {
   		$item['ICON'] = file_get_contents($_SERVER['DOCUMENT_ROOT'].CFile::GetPath($arSect['UF_SVG']));
   	}
endif;
?>
<h2 class="page__title page__title--icon"><?=$item['ICON']?><?=$item['NAME']?></h2>
<div class="row">
	<div class="col-xs-9">
		<?=$item['~DETAIL_TEXT']?>
		<div class="page__divider page__divider--small"></div>		
	</div>
	<div class="col-xs-3">
		<?if($item['IBLOCK_ID']!=18):?>
			<?if($item['IBLOCK_ID']==4):?>
			<h5>другие отрасли</h5>
			<?else:?>
			<h5>другие услуги</h5>
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
		<?else:
			$APPLICATION->IncludeComponent("bitrix:news.list", "section", 
		        array(
		          "IBLOCK_ID"      => $item['IBLOCK_ID'],
		          "NEWS_COUNT"     => "100",
		          "SORT_BY1"       => "SORT",
		          "SORT_ORDER1"    => "ASC",
		          "PARENT_SECTION" => $item['IBLOCK_SECTION_ID'],
		          "DETAIL_URL"     => $arParams["DETAIL_URL"],
		          "CACHE_TYPE"     => "A",
		          "SET_TITLE"      => "N",
		          "CACHE_NOTES"    => $item['ID'],
		          "PROPERTY_CODE"  => array('SVG')
		        ),
		        false
		    );
		endif;?>
	</div>
</div>
<?
	if($item['IBLOCK_ID']==4):
		$prop = "PROPERTY_INDUSTRIES";
		$title = "Проекты данной отрасли";
	elseif($item['IBLOCK_ID']==18):
		$prop = "PROPERTY_TECH_ELEMENTS";
		$title = "Проекты c данной технологией";
	else:
		$prop = "PROPERTY_DEPTH";
		$title = "Проекты данного вида деятальности";
	endif;
  	ob_start();
  	global $projectFilter;
  	$projectFilter = array($prop=>$item['ID']);
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
  		$items = ob_get_contents();
	ob_end_clean();
?>
<?if(strlen($items)>0):?>
	
	<h3 class="l-margin-bottom"><?=$title?></h3>
	<?=$items?>
	<p class="xs-margin-top"><a href="/works/">Все проекты</a></p>
	
<?endif;?>

