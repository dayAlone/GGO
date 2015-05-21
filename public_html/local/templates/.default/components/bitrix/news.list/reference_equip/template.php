<? $this->setFrameMode(true);?>

<div class="reference-wrap">
<a href="#" class="reference-wrap__trigger">Референс по поставкам оборудования <?=svg('steps-arrow')?></a>
  <div class="reference-wrap__content">
  	<?foreach ($arResult['SECTIONS'] as $key=>$section):?>
    	<div class="reference reference--small">
        	<a href="#" class="reference__trigger"><?=svg('next')?><?=$section['NAME']?></a>
          <div class="reference__content">
          	<table cellpadding="10" class="table" valign="middle">
              <thead>
                <tr>
                	<th width="40%">Наименование оборудования</th>
                  <th width="20%" class="year">год</th>
                  
                  <th width="40%">объект</th>
                </tr>
              </thead>
              <tbody>
              <?foreach ($section['ELEMENTS'] as $info):?>
                <tr>
                	<td><?=$info['name']?></td>
                  <td class="year"><?=$info['period']?></td>
                  <td><?=$info['object']?></td>
                </tr>
              <?endforeach;?>
              </tbody>
            </table>
          </div>
      </div>
  	<?endforeach;?>
  </div>
</div>