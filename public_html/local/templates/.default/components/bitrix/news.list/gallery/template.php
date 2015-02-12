<? $this->setFrameMode(true);?>
<?if(count($arResult['ITEMS'])>0):?>
<div class="projects">
<?foreach ($arResult['ITEMS'] as $key=>$item):
	?>
	<a style="background-image: url(<?=$item['PROPERTIES']['IMAGES']['VALUE'][0]['small']?>)" data-pictures='<?=json_encode($item['PROPERTIES']['IMAGES']['VALUE'])?>' href="#" class="project"><span><?=$item['NAME']?></span></a>
	
<?endforeach;?>
</div>
<?endif;?>