<div class="vacancy-popup">
    <div class="success">
      <h3 class="center">Ваша заявка успешно отправлена.</h3>
      <p class="center">В ближайшее время представители нашей компании свяжутся с вами. Благодарим за обращение.</p>
    </div>
    <form data-parsley-validate="" enctype="multipart/form-data" class="form visible">
      <h3>Отправка резюме в базу соискателей</h3>
      <input type="hidden" name="group_id" value="6">
      <input type="hidden" name="vacancy" value="">
      <label>представьтесь, пожалуйста <span>*</span></label>
      <input name="name" type="text" required="">
      <div class="row">
        <div class="col-sm-6">
          <label>номер телефона для связи с вами <span>*</span></label>
          <input name="phone" required="" type="text" data-parsley-pattern="/^((8|+7)[- ]?)?((?d{3})?[- ]?)?[d- ]{7,10}/" data-parsley-trigger="change">
        </div>
        <div class="col-sm-6">
          <label>e-mail для связи с вами</label>
          <input name="email" type="email">
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6">
          <label>расскажите немного о себе, пожалуйста</label>
          <textarea name="message"></textarea>
        </div>
        <div class="col-sm-6">
          <div class="row file">
            <div class="col-xs-6">
              <label for="file">приложите, пожалуйста, ваше резюме <span>*</span></label>
            </div>
            <div class="col-xs-6">
              <input type="file" name="resume" required="" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document" class="hidden"><a href="#" class="file-trigger">Загрузить файл</a>
            </div>
          </div>
          <div class="file-name"></div>
          <div class="file-description">Обратите внимание, мы принимаем файлы в форматах PDF, DOC, DOCX, размером не более 5 Мб.<br>Мы не рассматриваем заявки без резюме.</div>
        </div>
      </div>
      <div class="form__footer">
        <div class="row">
          <div class="col-sm-3 hidden-xs"><span class="required">Поля, отмеченные<br>	знаком <span>*</span>	обязательны<br>	к заполнению.</span></div>
          <div class="col-sm-3">
            <label class="left">введите данный код</label>
            <?
	        include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
	        $cpt = new CCaptcha();
	        $cpt->SetCodeLength(4);
	        $cpt->SetCode();
	        $cpt->SetImageSize(110,35);
	        $code=$cpt->GetSID();
	      ?>
		      <div class="captcha" style="background-image:url(/include/captcha.php?captcha_sid=<?=$code?>)"></div>

		    <input type="hidden" name="captcha_code" value="<?=$code?>">
            	<a href="#" class="captcha__refresh"><?=svg('refresh')?></a>
          </div>
          <div class="col-sm-3">
            <label class="right">в это поле</label>
            <input name="captcha_word" type="text" required="">
          </div>
          <div class="col-sm-3">
            <input type="submit" value="Отправить">
          </div>
        </div>
      </div>
    </form>
  </div>