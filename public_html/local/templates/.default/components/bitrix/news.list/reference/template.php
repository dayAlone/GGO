<? $this->setFrameMode(true);?>
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
	
	<?foreach ($arResult['SECTIONS'] as $key=>$section):?>
		<div id="<?=$section['CODE']?>" role="tabpanel" class="tab-pane <?=($key==$first?'active':'')?>">
			<?foreach ($section['ELEMENTS'] as $item):?>
				<div class="reference">
		          	<a href="#" class="reference__trigger"><?=svg('next')?><?=$item['NAME']?></a>
		            <div class="reference__content">
		              <table cellpadding="10" class="table">
		                <thead>
		                  <tr>
		                    <th width="25%">объект</th>
		                    <th width="15%" class="hidden-xs">регион</th>
		                    <th width="15%" class="hidden-xs">период</th>
		                    <th width="25%">проект</th>
		                    <th width="20%">вид работ</th>
		                  </tr>
		                </thead>
		                <tbody>
		                <?foreach ($item['INFORMATION'] as $info):?>
		                  <tr>
		                    <td>
		                    	<small class="visible-xs"><strong><?=$info['period']?></strong></small>
		                    	<?=$info['object']?>
		                    	<small class="visible-xs">
									<strong>Регион:</strong> <?=$info['region']?>
								</small>
		                    </td>
		                    <td class="hidden-xs"><?=$info['region']?></td>
		                    <td class="hidden-xs"><?=$info['period']?></td>
		                    <td><?=$info['project']?></td>
		                    <td><?=$info['works']?></td>
		                  </tr>
		                <?endforeach;?>
		                </tbody>
		              </table>
		            </div>
		        </div>
			<?endforeach;?>
		</div>
	<?endforeach;?>
	</div>
</div>