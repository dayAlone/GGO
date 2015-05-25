<!DOCTYPE html>
<html lang='ru'>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <?
  $APPLICATION->SetAdditionalCSS("http://fonts.googleapis.com/css?family=PT+Sans:400,700&subset=latin,cyrillic", true);
  $APPLICATION->SetAdditionalCSS("/layout/css/frontend.css", true);
  $APPLICATION->AddHeadScript('/layout/js/frontend.js');

  $APPLICATION->AddHeadScript('http://127.0.0.1:35729/livereload.js?ext=Safari&extver=2.0.9');
  $APPLICATION->ShowViewContent('header');?>
  <title><?php 
    $rsSites = CSite::GetByID(SITE_ID);
    $arSite  = $rsSites->Fetch();
    if($APPLICATION->GetCurDir() != '/') {
      $APPLICATION->ShowTitle();
      
      echo ' | ' . $arSite['NAME'];
    }
    else echo $arSite['NAME'];
    ?></title>
  <?
    $APPLICATION->ShowHead();
    $APPLICATION->ShowViewContent('header');
  ?>
  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="<?=$APPLICATION->AddBufferContent("body_class");?> <?=LANGUAGE_ID?>">
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-xs-9 col-sm-4"><a href="<?=(LANGUAGE_ID == "ru"?"/":"/en/")?>" class="logo"><?=svg('logo'.(LANGUAGE_ID == "ru"?"":"-en"))?></a></div>
      <div class="col-xs-3 right visible-xs">
        <a href="#Nav" data-toggle="modal" data-target="#Nav" class="header__trigger"><?=svg('nav')?></a>
      </div>
      <div class="hidden-xs col-sm-8">
        <div class="header__nav">
          <div class="right">
            <?/*
              <span class="header__lang">
                <a href="/" class="header__lang__item <? if(LANGUAGE_ID == "ru"): ?>header__lang__item--active<?endif;?>">RU</a>
                <a href="/en/" class="header__lang__item <? if(LANGUAGE_ID == "en"): ?>header__lang__item--active<?endif;?>">EN</a>
              </span>
            */?>
            <span class="search">
              <a href="#" class="search__trigger"><?=svg('seach')?></a>
              <form class="search__form" action="<?=(LANGUAGE_ID == "ru"?"":"/en")?>/search/">
                <input type="text" name="q">
                <button type="submit">
                  <?=svg('seach')?>
                </button>
              </form>
            </span>
            <a href="https://www.facebook.com/giprogazoochistka" class="header__social"><?=svg('fb')?></a>
            
          </div>
          <div class="row">
            <div class="col-md-4">
              <?php
                  $APPLICATION->IncludeComponent("bitrix:menu", "menu", 
                  array(
                      "ALLOW_MULTI_SELECT" => "Y",
                      "MENU_CACHE_TYPE"    => "A",
                      "ROOT_MENU_TYPE"     => "main",
                      "MAX_LEVEL"          => "1",
                      "CLASS"              => "nav--big"
                      ),
                  false);
              ?>
            </div>
            <div class="col-md-8 md-right">
                <?php
                  $APPLICATION->IncludeComponent("bitrix:menu", "menu", 
                  array(
                      "ALLOW_MULTI_SELECT" => "Y",
                      "MENU_CACHE_TYPE"    => "A",
                      "ROOT_MENU_TYPE"     => "top",
                      "MAX_LEVEL"          => "1"
                      ),
                  false);
                ?>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</header>