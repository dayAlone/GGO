
<?
$item = $arResult;
?>
<div class="scroll">
  <h4><span>Клиент</span></h4>
  <h2><?=html_entity_decode($item['PROPERTIES']['CLIENT']['VALUE'])?></h2>

<?
$data = array(
  'Объект'    => $item['PROPERTIES']['OBJECT']['VALUE']['TEXT'],
  'Регион'    => $item['PROPERTIES']['REGION']['VALUE'],
  'Период'    => $item['PROPERTIES']['PERIOD']['VALUE'],
  'Вид работ' => $item['PROPERTIES']['WORKS']['VALUE']['TEXT'],
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