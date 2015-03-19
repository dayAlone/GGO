<?
$item = $arResult;
foreach ($item['PROPERTIES']['INFORMATION']['VALUE'] as $key=>$info)
  if($key == $arParams['CACHE_NOTES'])
    $element = $info;
if(isset($element)):
?>
<div class="scroll">
  <h4><span>Клиент</span></h4>
  <h2><?=html_entity_decode($item['NAME'])?></h2>

<?
$data = array(
  'Объект' => $element['object'],
  'Регион' => $element['region'],
  'Период' => $element['period'],
  'Проект' => $element['project'],
  'Вид работ' => $element['works'],
);
foreach ($data as $key=>$el):
  if(strlen($el)>0):
  ?>
  <h4><span><?=$key?></span></h4>
  <p><?=html_entity_decode($el)?></p>
  <?
  endif;
endforeach;?>

</div>
<?endif;?>