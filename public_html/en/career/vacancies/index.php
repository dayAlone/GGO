<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Vacancies');
?> 
<div class="row">
  
  <div class="col-md-8 col-md-push-4">
  	<?
  		if(!isset($_REQUEST['ELEMENT_CODE'])):
		    $APPLICATION->SetTitle('Vacancies');
			ob_start();
			    $APPLICATION->IncludeComponent("bitrix:news.list", "news", 
				array(
					"IBLOCK_ID"            => 13,
					"NEWS_COUNT"           => "20",
					"SORT_BY1"             => "ACTIVE_FROM",
					"SORT_ORDER1"          => "DESC",
					"DETAIL_URL"           => "/en/career/vacancies/#ELEMENT_CODE#/",
					"CACHE_TYPE"           => "A",
					"SET_TITLE"            => "N",
					"SHOW_DESCRIPTION"     => "Y",
					"DISPLAY_BOTTOM_PAGER" => "Y",
					"SHOW_VACANCY"         => "Y"
				),
				false
				);
			$vacancies = ob_get_contents();
			ob_end_clean();
			if(strlen($vacancies)>0):?>
				<p class="blue xl-margin-bottom">Сегодня в компаниях группы открыты следующие вакансии:</p>
				<?=$vacancies?>
			<?
			else:?>
				<p class="blue xl-margin-bottom">At present there are no open vacancies.</p>
			<?endif;
		else:
		    $APPLICATION->SetPageProperty('page_title', 'Вакансии');
		    $APPLICATION->IncludeComponent("bitrix:news.detail","career",Array(
		      "IBLOCK_ID"     => 13,
		      "ELEMENT_CODE"  => $_REQUEST['ELEMENT_CODE'],
		      "CHECK_DATES"   => "N",
		      "IBLOCK_TYPE"   => "content",
		      "SET_TITLE"     => "Y",
		      "CACHE_TYPE"    => "A",
		      "PROPERTY_CODE" => array("GALLERY"),
		    
		    ));
		endif;
	?>
  </div>
  <div class="col-md-4 col-md-pull-8 page__side">
    <div class="page__side-divider hidden-md hidden-lg"></div>
    <p>Giprogazoochistka Group is a team of professionals with strong competencies and a wealth of experience in gas purification and ecology of air. The engineering company has attained international acclaim through the use of innovative approaches, cutting-edge technologies and high quality of works it performs. Please send your detailed résumés at job@ggo.ru </p>
	<p>For additional information, please contact our Human Resource Department at +7 (495) 231-30-40. </p>
	<div class="page__side-divider"></div>
	<p>Dear colleagues! We are pleased to announce that JSC Giprogazoochistka is seeking to contract out some design and engineering works to freelance engineering professionals. To be considered for a freelance position, please open the <a data-toggle="modal" data-target="#vacancyDetail" href="#vacancyDetail">link</a> and fill out the application form. </p>
	<p>Filled out applications shall be sent at the following email: <a href="mailto:SDvornikov@ggo.ru">SDvornikov@ggo.ru</a> </p>
  </div>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>