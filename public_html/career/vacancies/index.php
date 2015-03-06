<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle('Вакансии');
?> 
<div class="row">
  
  <div class="col-md-8 col-md-push-4">
  	<?
  		if(!isset($_REQUEST['ELEMENT_CODE'])):
		    $APPLICATION->SetTitle('Вакансии');
			?><p class="blue xl-margin-bottom">Сегодня в компаниях группы открыты следующие вакансии:</p><?
		    $APPLICATION->IncludeComponent("bitrix:news.list", "news", 
			array(
				"IBLOCK_ID"            => 13,
				"NEWS_COUNT"           => "20",
				"SORT_BY1"             => "ACTIVE_FROM",
				"SORT_ORDER1"          => "DESC",
				"DETAIL_URL"           => "/career/vacancies/#ELEMENT_CODE#/",
				"CACHE_TYPE"           => "A",
				"SET_TITLE"            => "N",
				"SHOW_DESCRIPTION"     => "Y",
				"DISPLAY_BOTTOM_PAGER" => "Y",
				"SHOW_VACANCY"           => "Y"
			),
			false
			);
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
    <p>Группа «Гипрогазоочистка» — это профессиональная команда, обладающая	высокими компетенциями и богатым опытом работы в сфере газоочистки и экологии воздуха. Инжиниринговая компания достигла международного признания за счет применения инновационных подходов, суперсовременных технологий и высокого качества выполняемых работ. Ваши развернутые резюме высылайте по адресу <a href="mailto:job@ggo.ru">job@ggo.ru</a></p>
    <p>С дополнительной информацией Вас ознакомят в Департаменте кадровых служб, по телефону +7 (495) 231-30-40.</p>
    <div class="page__side-divider"></div>
    <p>Уважаемые коллеги! Рады сообщить, что ОАО «Гипрогазоочистка» приглашает к сотрудничеству подрядчиков на выполнение проектных работ в удаленном доступе (freelance). Для участия в наборе заполните пожалуйста анкету по <a data-toggle="modal" data-target="#vacancyDetail" href="#vacancyDetail">ссылке.</a></p>
    <p>Заполненные анкеты отправляйте на e-mail: <a href="mailto:SDvornikov@ggo.ru">SDvornikov@ggo.ru</a></p>
  </div>
</div>
<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>