<?
if(intval($arResult['IBLOCK_SECTION_ID'])>0):
	$res = CIBlockSection::GetByID($arResult['IBLOCK_SECTION_ID']);
	if($ar_res = $res->GetNext()):
		var_dump();
		LocalRedirect($ar_res['LIST_PAGE_URL'].$ar_res['CODE']."/");
	endif;	
endif;

?>