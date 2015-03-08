<div class="scroll-fix"></div>
<div id="Map" tabindex="-1" role="dialog" aria-hidden="true" data-parsley-validate class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content"><a data-dismiss="modal" href="#" class="close"><?=svg('close')?></a>
      <div id="contacts-map"></div>
    </div>
  </div>
</div>
<div id="Feedback" tabindex="-1" role="dialog" aria-hidden="true" data-parsley-validate class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content"><a data-dismiss="modal" href="#" class="close"><?=svg('close')?></a>
      <?require($_SERVER['DOCUMENT_ROOT'].'/include/form.php');?>
    </div>
  </div>
</div>
<?$APPLICATION->ShowViewContent('footer');?>
<div id="vacancyDetail" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content modal-content--white"><a data-dismiss="modal" href="#" class="close"><svg width="61" height="61" viewBox="0 0 61 61" xmlns="http://www.w3.org/2000/svg"><path d="M30.44 0C13.656 0 0 13.656 0 30.442c0 16.785 13.655 30.442 30.44 30.442 16.786 0 30.442-13.657 30.442-30.442C60.882 13.656 47.226 0 30.442 0zm0 58.884C14.76 58.884 2 46.124 2 30.442S14.758 2 30.44 2c15.684 0 28.442 12.76 28.442 28.442 0 15.683-12.758 28.442-28.44 28.442zm1.123-28.974L19.653 18l-1.414 1.414 11.91 11.91L18 43.474l1.414 1.414 12.15-12.15L43.71 44.89l1.414-1.415-12.148-12.148 11.91-11.91L43.474 18l-11.91 11.91z" id="Imported-Layers" fill="#0045D2" fill-rule="evenodd"/></svg></a>
      <?require($_SERVER['DOCUMENT_ROOT'].'/include/vacancies-form.php');?>
    </div>
  </div>
</div>
<div id="Nav" tabindex="-1" role="dialog" aria-hidden="true" class="modal fade overlay">
  <div class="modal-dialog">
    <div class="modal-content">
      <a data-dismiss="modal" href="#" class="close"><?=svg('close')?></a>
      <?php
          $APPLICATION->IncludeComponent("bitrix:main.map", ".default", Array(
            "LEVEL" =>  "2",
            "COL_NUM" =>  "1",
            "SHOW_DESCRIPTION"  =>  "Y",
            "SET_TITLE" =>  "Y",
            "CACHE_TIME"  =>  "36000000"
            )
          );
      ?>
    </div>
  </div>
</div>
<footer class="footer">
  <div class="container container--width">
    <div class="row">
      <?if($APPLICATION->GetCurDir()=="/" || $APPLICATION->GetPageProperty('hide_projects')==true):?>
      <div class="col-sm-8 col-md-6 footer__about">
        <h3>О компании</h3> 
        <p>История нашей компании началась в 1928 году. Ключевую идею успеха, которая сопровождает нас на протяжении десятков лет, мы видим в приверженности к индивидуальному подходу к каждому из наших заказчиков. Сочетание накопленного опыта и умения решать персональные инжиниринговые задачи, мастерство поиска и созидания комплексных высокотехнологичных решений сформировали философию компании «Инжиниринг как искусство», которая находит отражение в каждом нашем проекте. В нашем референс-листе более 4 000 технологических установок. Мы реализуем инжиниринговые проекты полного цикла – от проектирования до введения в эксплуатацию оборудования для объектов нефтегазодобычи, нефтегазопереработки и нефтехимии.</p> 
      </div>
      <?endif;?>
      <div class="col-sm-4 col-md-4 footer__news">
        <h3>Новости</h3>
        <?
          $APPLICATION->IncludeComponent("bitrix:news.list", "news", 
            array(
              "IBLOCK_ID"      => 1,
              "NEWS_COUNT"     => "2",
              "SORT_BY1"       => "ACTIVE_FROM",
              "SORT_ORDER1"    => "DESC",
              "DETAIL_URL"     => "/press/news/#ELEMENT_CODE#/",
              "CACHE_TYPE"     => "A",
              "SET_TITLE"      => "N",
              "DISPLAY_BOTTOM_PAGER" => "N"
            ),
            false
          );
        ?>
        <a href="/press/" class="news__more">К другим новостям</a>
      </div>
      <?if($APPLICATION->GetCurDir()!="/" && $APPLICATION->GetPageProperty('hide_projects')!=true):?>
      <div class="col-sm-8 col-md-6 footer__projects">
        <h3>Ключевые проекты</h3>
        <?
          $APPLICATION->IncludeComponent("bitrix:news.list", "projects", 
            array(
              "IBLOCK_ID"      => 2,
              "NEWS_COUNT"     => "8",
              "SORT_BY1"       => "RAND",
              "SORT_ORDER1"    => "ASC",
              "DETAIL_URL"     => "/works/projects/#ELEMENT_CODE#/",
              "CACHE_TYPE"     => "A",
              "CACHE_NOTES"    => $APPLICATION->GetCurDir(),
              "SET_TITLE"      => "N",
              "DISPLAY_BOTTOM_PAGER" => "N"
            ),
            false
          );
        ?>
        <a href="/works/" class="projects__more">К другим проектам</a>
      </div>
      <?endif;?>
      <div class="visible-md visible-lg col-xs-12 col-md-2">
        <h3>Навигация</h3>
            <?php
                $APPLICATION->IncludeComponent("bitrix:menu", "menu", 
                array(
                    "ALLOW_MULTI_SELECT" => "Y",
                    "MENU_CACHE_TYPE"    => "A",
                    "ROOT_MENU_TYPE"     => "main",
                    "MAX_LEVEL"          => "1",
                    "DIVIDER"            => "<br>"
                    ),
                false);
            ?>
          <div class="visible-lg nav__divider"></div>
         
            <?php
                $APPLICATION->IncludeComponent("bitrix:menu", "menu", 
                array(
                    "ALLOW_MULTI_SELECT" => "Y",
                    "MENU_CACHE_TYPE"    => "A",
                    "ROOT_MENU_TYPE"     => "top",
                    "MAX_LEVEL"          => "1",
                    "DIVIDER"            => "<br>"
                    ),
                false);
            ?>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row copyright">
      <div class="col-xs-6 col-sm-3">© <?=date('Y')?> ОАО “Гипрогазоочистка”</div>
      <div class="col-xs-6 col-sm-4">Россия, Москва, ул. Первомайская, 126<br><a href="mailto:info@ggo.ru">info@ggo.ru</a></div>
      <div class="col-xs-2 hidden-xs"><a href="/sitemap/">Карта сайта</a></div>
      <div class="col-xs-3 hidden-xs right">
        <a href="http://radia.ru" target="_blank" class="radia"><?=svg('radia')?><div class="radia__content">Разработка сайта <br>RADIA Interactive</div></a>
      </div>
    </div>
  </div>
</footer>
<div tabindex="-1" role="dialog" aria-hidden="true" class="pswp">
  <div class="pswp__bg"></div>
  <div class="pswp__scroll-wrap">
    <div class="pswp__container">
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
      <div class="pswp__item"></div>
    </div>
    <div class="pswp__ui pswp__ui--hidden">
      <div class="pswp__top-bar">
        <div class="pswp__counter"></div>
        <button title="Close (Esc)" class="pswp__button pswp__button--close"></button>
        <button title="Share" class="pswp__button pswp__button--share"></button>
        <button title="Toggle fullscreen" class="pswp__button pswp__button--fs"></button>
        <button title="Zoom in/out" class="pswp__button pswp__button--zoom"></button>
        <div class="pswp__preloader">
          <div class="pswp__preloader__icn">
            <div class="pswp__preloader__cut">
              <div class="pswp__preloader__donut"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
        <div class="pswp__share-tooltip"></div>
      </div>
      <button title="Previous (arrow left)" class="pswp__button pswp__button--arrow--left"></button>
      <button title="Next (arrow right)" class="pswp__button pswp__button--arrow--right"></button>
      <div class="pswp__caption">
        <div class="pswp__caption__center"></div>
      </div>
    </div>
  </div>
</div></body>
</html>