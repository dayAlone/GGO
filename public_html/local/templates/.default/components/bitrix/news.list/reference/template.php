<? $this->setFrameMode(true);?>
<?/*
<div role="tabpanel">

	<ul role="tablist" class="nav nav-tabs">
	<?
	$s = array_keys($arResult['SECTIONS']);
	$first = $s[0];
	foreach ($arResult['SECTIONS'] as $key=>$section):?>
	    <li role="presentation" <?=($key==$first?'class="active"':'')?>><a href="#<?=$section['CODE']?>" aria-controls="home" role="tab" data-toggle="tab"><?=$section['NAME']?></a></li>
	<?endforeach;?>
	</ul>
	<div class="tab-content">
	<?=($key==$first?'active':'')?>
*/?>	
	<?foreach ($arResult['SECTIONS'] as $key=>$section):?>
		<div id="<?=$section['CODE']?>" role="tabpanel" class="tab-pane active ">
			<?foreach ($section['ELEMENTS'] as $item):?>
				<div class="reference">
		          	<a href="#" class="reference__trigger"><?=svg('next')?><?=$item['NAME']?></a>
		            <div class="reference__content">
		            	<div class="list">
			            	<?foreach ($item['INFORMATION'] as $key=>$info):?>
			            		<?if($key>0):?>
			            			<div class="list__divider"></div>
			            		<?endif;?>
			            		<small>заказчик:</small> <br><?=$info['client']?><br>
								<div class="row xs-margin-top">
									<div class="col-xs-6">
										<small>период:</small> <br><?=str_replace("по н.в.", "<nobr>по н.в.</nobr>", $info['period'])?><br>
									</div>
									<div class="col-xs-6">										
										<small>страна, регион:</small> <br><?=$info['region']?><br>
									</div>
									
								</div>
								<small>наименование проекта, объект:</small> <br><?=$info['object']?><br>
								<small>вид работ:</small><br> <?=$info['works']?><br>
								<small>Виды работ EPsCm:</small> <br><?=$info['epscm']?><br>
			                <?endforeach;?>
		            					
		            	</div>
		              <table cellpadding="10" class="table">
		                <thead>
		                  <tr>
		                  	<th width="20%">заказчик</th>
		                    <th width="10%" class="hidden-xs">регион, <br>страна</th>
							<th width="10%" class="hidden-xs">период</th>
		                    
		                    <th width="25%">наименование проекта, <br>объект</th>
		                    
		                    <th width="25%">вид работ</th>
		                    <th width="10%"><nobr>вид работ</nobr><br>EPsCm</th>
		                  </tr>
		                </thead>
		                <tbody>
		                <?foreach ($item['INFORMATION'] as $info):?>
		                  <tr>
		                  	<td><?=$info['client']?></td>
		                  	<td class="hidden-xs"><?=$info['region']?></td>
		                    <td class="hidden-xs"><?=$info['period']?></td>
		                    <td>
		                    	<small class="visible-xs"><strong><?=$info['period']?></strong></small>
		                    	<?=$info['object']?>
		                    	<div class="visible-xs">
		                    		<small class=""><strong>Регион, страна:</strong> <?=$info['region']?></small>	
		                    	</div>
		                    </td>
		                    
		                    <td><?=$info['works']?></td>
		                    <td><?=$info['epscm']?></td>
		                  </tr>
		                <?endforeach;?>
		                </tbody>
		              </table>
		            </div>
		        </div>
			<?endforeach;?>

		</div>
	<?endforeach;?><?/*
	</div>
</div>
*/?>