<? $this->setFrameMode(true);?>
<?if(count($arResult['ITEMS'])>0):?>
<div class="row xxl-margin-top row--center center s-padding-top m-padding-bottom no-gutter row--center">
<?foreach ($arResult['ITEMS'] as $key=>$item):
	?><div class="col-xs-12 col-sm-4 col-md-2 <?=($key==0?"col-md-offset-1":"")?>"><a href="<?=$item['DETAIL_PAGE_URL']?>" class="depth"><?=$item['ICON']?><br><?=$item['NAME']?></a></div><?
endforeach;?>
<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>
</div>
<?endif;?>