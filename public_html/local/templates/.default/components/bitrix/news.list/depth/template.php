<? $this->setFrameMode(true);?>
<?if(count($arResult['ITEMS'])>0):?>
<div class="row xxl-margin-top row--center center s-padding-top m-padding-bottom no-gutter">
  

<?foreach ($arResult['ITEMS'] as $key=>$item):?>
	<div class="col-xs-2 <?=($key==0?"col-xs-offset-1":"")?>"><a href="<?=$item['DETAIL_PAGE_URL']?>" class="depth"><?=$item['ICON']?><br><?=$item['NAME']?></a></div>
	
<?endforeach;?>
<?=($arParams["DISPLAY_BOTTOM_PAGER"]=="Y" ? $arResult["NAV_STRING"]:"")?>
</div>
<?endif;?>