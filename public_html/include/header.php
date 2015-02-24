<!DOCTYPE html>
<html lang='ru'>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=980"> <?/*device-width, user-scalable=no, initial-scale=1, maximum-scale=1">*/?>
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
  <?
  $APPLICATION->SetAdditionalCSS("/layout/css/frontend.css", true);
  $APPLICATION->AddHeadScript('/layout/js/frontend.js');
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
</head>
<body class="<?=$APPLICATION->AddBufferContent("body_class");?>">
<div id="panel"><?$APPLICATION->ShowPanel();?></div>
<header class="header">
  <div class="container">
    <div class="row">
      <div class="col-xs-4"><a href="/" class="logo"><?=svg('logo')?></a></div>
      <div class="col-xs-3">
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
      <div class="col-xs-5 right">
        <div class="header__box">
          <span class="header__lang">
            <a href="#" class="header__lang__item header__lang__item--active">RU</a>
            <a href="#" class="header__lang__item">EN</a>
          </span>
          <span class="search">
            <a href="#" class="search__trigger"><?=svg('seach')?></a>
            <form class="search__form" action="/search/">
              <input type="text" name="q">
              <button type="submit">
                <?=svg('seach')?>
              </button>
            </form>
          </span>
          <a href="#" class="header__social"><?=svg('fb')?></a><a href="#" class="header__social"><?=svg('li')?></a>
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
</header>