<?require($_SERVER['DOCUMENT_ROOT'].'/include/header.php');?>
<div class="page">
  <div style="background-image:url(<?=$_GLOBALS['BG_IMAGE']?>)" class="page__header"></div>
  <div class="container">
  <?if(!strstr($APPLICATION->GetCurDir(),"/works/projects/")):?>
  <div class="row">
    <div class="col-sm-7">
      <h1 class="page__title">
        <?
          $APPLICATION->AddBufferContent("page_title");
        ?>
      </h1>
    </div>
    <div class="col-sm-5 sm-right">
      <?$APPLICATION->ShowViewContent('title');?>
    </div>
  </div>
  <?else:?>
    <h1 class="page__title">
      <?
        $APPLICATION->AddBufferContent("page_title");
      ?>
    </h1>
  <?endif;?>
  <div class="page__divider"></div>
    <?php
      $APPLICATION->IncludeComponent("bitrix:menu", "menu", 
      array(
          "ALLOW_MULTI_SELECT" => "Y",
          "MENU_CACHE_TYPE"    => "A",
          "ROOT_MENU_TYPE"     => "header",
          "MAX_LEVEL"          => "1",
          "SHOW"               => "Y"
          ),
      false);
    ?>