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
		"CONDITION" => "#^/works/technologies/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/works/technologies/detail.php",
	),
	array(
		"CONDITION" => "#^/ajax/works/projects/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/ajax/works/projects/index.php",
	),
	array(
		"CONDITION" => "#^/ajax/works/reference/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_ID=\$1&ROW=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/ajax/works/reference/index.php",
	),
	array(
		"CONDITION" => "#^/ajax/en/works/projects/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/ajax/works/projects/index.php",
	),
	array(
		"CONDITION" => "#^/ajax/en/works/reference/([\\w-_]+)/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_ID=\$1&ROW=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/ajax/works/reference/index.php",
	),
	array(
		"CONDITION" => "#^/en/press/news/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/en/press/news/index.php",
	),
	array(
		"CONDITION" => "#^/en/career/vacancies/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/en/career/vacancies/index.php",
	),
	array(
		"CONDITION" => "#^/en/works/projects/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/en/works/projects/index.php",
	),
	array(
		"CONDITION" => "#^/en/works/industries/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/en/works/industries/detail.php",
	),
	array(
		"CONDITION" => "#^/en/works/depths/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/en/works/depths/detail.php",
	),
	array(
		"CONDITION" => "#^/en/works/technologies/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/en/works/technologies/detail.php",
	),
	array(
		"CONDITION" => "#^/en/ajax/works/projects/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_CODE=\$1&\$2",
		"ID"        => "",
		"PATH"      => "/en/ajax/works/projects/index.php",
	),
	array(
		"CONDITION" => "#^/en/ajax/works/reference/([\\w-_]+)/([\\w-_]+)/.*#",
		"RULE"      => "&ELEMENT_ID=\$1&ROW=\$2&\$3",
		"ID"        => "",
		"PATH"      => "/en/ajax/works/reference/index.php",
	),
);

?>