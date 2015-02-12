<? $this->setFrameMode(true);?>
<?foreach ($arResult['SECTIONS'] as $key=>$section):?>
	<h3><?=$section['NAME']?></h3>
	<div class="center">
	<?foreach ($section['ELEMENTS'] as $item):?>
		<a href="<?=$item['LINK']?>" class="client"><img src="<?=$item['IMAGE']?>"></a>
	<?endforeach;?>
	</div>
<?endforeach;?>
