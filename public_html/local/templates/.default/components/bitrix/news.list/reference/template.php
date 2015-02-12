<? $this->setFrameMode(true);?>
<div role="tabpanel">
	<ul role="tablist" class="nav nav-tabs">
	<?
	$first = array_keys($arResult['SECTIONS'])[0];
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
		                    <th width="15%">регион</th>
		                    <th width="15%">период</th>
		                    <th width="25%">проект</th>
		                    <th width="20%">вид работ</th>
		                  </tr>
		                </thead>
		                <tbody>
		                <?foreach ($item['INFORMATION'] as $info):?>
		                  <tr>
		                    <td><?=$info['object']?></td>
		                    <td><?=$info['region']?></td>
		                    <td><?=$info['period']?></td>
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