<? $this->setFrameMode(true);?>

<div class="geography">
      <div class="geography__popup">
        <div class="geography__popup_toolbar">
        	<a href="#" class="geography__popup_close"><?=svg('close')?> Закрыть</a></div>
        <div class="geography__popup_content">
          <?/*<div class="scroll">
            <h4><span>Заказчик</span></h4>
            <h2>Роснефть</h2>
            <h4><span>Объект</span></h4>
            <p>РН-Туапсинский НПЗ</p>
            <h4><span>Проект</span></h4>
            <p>Комбинированная установка КУ-3. Объект 672-10. Секция «Производство элементарной серы», «Доочистка хвостовых газов», «Узел дегазации серы»</p>
            <p>Комбинированная установка КУ-3. Объект 672-10. Секция «Производство элементарной серы», «Доочистка хвостовых газов», «Узел дегазации серы»</p><img src="/layout/images/img.jpg">
          </div>
          */?>
        </div>
      </div>
      <div id="map"></div>
      <?	
      	$data = array();
      	foreach ($arResult['ITEMS'] as $key=>$item):
      		$data[] = array('id'=>$item['ID'], 'name'=>$item['NAME'], 'coords'=>$item['PROPERTIES']['COORDS']['VALUE'], 'url'=>$item['DETAIL_PAGE_URL']);
		endforeach;
	  ?>

      <script>mapItems = <?=json_encode($data, JSON_UNESCAPED_UNICODE);?></script>
</div>