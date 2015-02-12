<?
$arUrlRewrite = array(
	array(
		"CONDITION" => "#^/press/news/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/press/news/index.php",
	),
	array(
		"CONDITION" => "#^/career/vacancies/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/career/vacancies/index.php",
	),
	array(
		"CONDITION" => "#^/works/projects/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/works/projects/index.php",
	),
	array(
		"CONDITION" => "#^/works/industries/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/works/industries/detail.php",
	),
	array(
		"CONDITION" => "#^/works/depths/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/works/depths/detail.php",
	),
	array(
		"CONDITION" => "#^/ajax/works/projects/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/ajax/works/projects/index.php",
	),
);

?>