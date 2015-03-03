<? $this->setFrameMode(true);
if(count($arResult['ITEMS'])>0):?>
<div class="projects">
<?foreach ($arResult['ITEMS'] as $key=>$item):
	?><a href="<?=$item['DETAIL_PAGE_URL']?>" style="background-image: url(<?=$item['PREVIEW_PICTURE']['SRC']?>)" class="project">
		<span><?=$item['NAME']?></span>
	</a><?
endforeach;?>
<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>
</div>
<?endif;?>