<?
	$arResult['SECTIONS'] = array();
	function reference_sort($a, $b)
    {
        if($a['sort']=='' && $b['sort']>0) 
            return 1;
        if($b['sort']=='' && $a['sort']>0) 
            return -1;
        if($a['sort']=='' && $b['sort']=='')
            return ($a['value'] < $b['value']) ? -1 : 1;
        if ($a['sort'] == $b['sort'])
            return 0;
        return ($a['sort'] < $b['sort']) ? -1 : 1;
    }	
	foreach ($arResult['ITEMS'] as $key=>$item):
		if(!isset($arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]))
			$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']] = array('ELEMENTS' => array());
		$arResult['SECTIONS'][$item['IBLOCK_SECTION_ID']]['ELEMENTS'][] = array(
			'NAME'   => $item['NAME'],
			'CODE'   => $item['CODE'],
			'sort'   => $item['SORT'],
			'client' => $item['PROPERTIES']['CLIENT']['VALUE'],
			'object' => $item['PROPERTIES']['OBJECT']['VALUE']['TEXT'],
			'region' => $item['PROPERTIES']['REGION']['VALUE'],
			'period' => $item['PROPERTIES']['PERIOD']['VALUE'],
			'works'  => $item['PROPERTIES']['WORKS']['VALUE']['TEXT'],
			'epscm'  => $item['PROPERTIES']['EPSCM']['VALUE'],
			'coords' => $item['PROPERTIES']['COORDS']['VALUE'],
			);
	endforeach;
	
	foreach ($arResult['SECTIONS'] as $key=>$item):
		usort($item['ELEMENTS'], "reference_sort");
	endforeach;

	$arFilter = array('IBLOCK_ID' => $arResult['ID'], 'ID'=>array_keys($arResult['SECTIONS']));
   	$rsSect = CIBlockSection::GetList(array('left_margin' => 'asc'),$arFilter);
   	while ($arSect = $rsSect->Fetch()) {
   		$arResult['SECTIONS'][$arSect['ID']]['NAME'] = $arSect['NAME'];
   		$arResult['SECTIONS'][$arSect['ID']]['CODE'] = $arSect['CODE'];
   	}
?>