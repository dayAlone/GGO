<? $this->setFrameMode(true);?>
<?	
	$data = array();
	foreach ($arResult['ITEMS'] as $item):
		foreach ($item['PROPERTIES']['INFORMATION']['VALUE'] as $key=>$info):
			if(strlen($info['coords']) > 0)
				$data[] = array('id'=>$item['ID'].$key, 'name'=>$info['object'], 'coords'=>$info['coords'], 'url'=>$item['DETAIL_PAGE_URL']."/".$key."/");
		endforeach;
	endforeach;
	$json = json_encode($data, JSON_UNESCAPED_UNICODE);
?>
<script>mapRefItems = <?=(strlen($json)>0?$json:"")?></script>