<? $this->setFrameMode(true);?>
<?if(count($arResult)>0):?>
<nav class="nav <?=$arParams['CLASS']?>"><?foreach ($arResult as $key=>$item):?><a href="<?=$item['LINK']?>" <?=$item['PARAMS']['MORE']?> class="nav__item <?=($item['SELECTED']?'nav__item--active':'')?>"><?=$item['TEXT']?></a><?endforeach;?>
<?
if($arParams['SHOW']=="Y"):
	$APPLICATION->ShowViewContent('menu');
endif;
?>
</nav>
<?endif;?>