<? $this->setFrameMode(true);?>
<div class="partners">
<?foreach ($arResult['ITEMS'] as $item):?>
	<div class="partner">
		<div class="partner__content" style="border-color: <?=$item['PROPERTIES']['COLOR']['VALUE']?>">
			<?foreach ($item['PROPERTIES']['LIST']['VALUE'] as $key => $value) {
				?>— <?=$value?><br><?
			}?>
		</div>
		<div class="partner__name" style="background: <?=$item['PROPERTIES']['COLOR']['VALUE']?>">
			<span><?=$item['NAME']?></span>
		</div>
	</div>
<?endforeach;?>
</div>