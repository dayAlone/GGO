<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/header.php');
$APPLICATION->SetTitle("Services");
?> 
<p class="highlight">JSC Giprogazoochistka is an engineering company that carries out a complete range of works and services for oil & gas production and processing companies as well as petrochemical and chemical plants providing management of projects throughout the entire project life cycle. 
</p>
<?
      $APPLICATION->IncludeComponent("bitrix:news.list", "depth", 
        array(
          "IBLOCK_ID"      => 24,
          "NEWS_COUNT"     => "10",
          "SORT_BY1"       => "SORT",
          "SORT_ORDER1"    => "ASC",
          "DETAIL_URL"     => "/en/works/depths/#ELEMENT_CODE#/",
          "CACHE_TYPE"     => "A",
          "SET_TITLE"      => "N",
          "PROPERTY_CODE"  => array('SVG'),
          "DISPLAY_BOTTOM_PAGER" => "N"
        ),
        false
      );
    ?>
<div class="xxl-margin-top page__divider"></div>
<p class="bigger l-line-height xxl-margin-bottom">The Company's experience and expertise 
embrace such specialist fields as design and engineering of process units of various levels of complexity, process control automation, selection and supply of equipment and materials, design supervision, construction management and pre-commissioning works. </p>

<p class="highlight">JSC Giprogazoochistka develops efficient projects using time-tested process technologies and industry experience to provide optimal turn-key solutions. </p>



<?
require($_SERVER['DOCUMENT_ROOT'].'/bitrix/footer.php');
?>