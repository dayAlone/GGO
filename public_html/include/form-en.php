<div class="feedback">
<div class="feedback__success">
  <h1 class="center">Your message has been sent successfully.</h1>
  <p class="center">Our company representatives will contact you soon. Thank you for contacting.</p>
</div>
<form class="feedback__form" data-parsley-validate>
  <input type="hidden" name="group_id" value="5">
  <label>Introduce yourself, please</label>
  <input name="name" type="text" required>
  <label>Your E-mail</label>
  <input name="email" type="email" required>
  <label>Your phone number</label>
  <input name="phone" type="text" data-parsley-pattern="/^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}/" data-parsley-trigger="change">
  <label>Your message</label>
  <textarea required name="message"></textarea>
  <div class="row">
    <div class="col-xs-5">
      <label class="left">Enter <span class="hidden-xs">this</span> code</label>
      <?
          include_once($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/classes/general/captcha.php");
          $cpt = new CCaptcha();
          $cpt->SetCodeLength(4);
          $cpt->SetCode();
          $cpt->SetImageSize(110,35);
          $code=$cpt->GetSID();
        ?>
      <div class="captcha" style="background-image:url(/include/captcha.php?captcha_sid=<?=$code?>)"></div>
    </div>
    <div class="col-xs-2 no-padding center">
      
      <input type="hidden" name="captcha_code" value="<?=$code?>">
      <a href="#" class="captcha_refresh">
        <?=svg('refresh')?>
      </a>
    </div>
    <div class="col-xs-5">
      <label class="right">into this field</label>
      <input name="captcha_word" type="text" required>
    </div>
  </div>
  <div class="center">
    <input type="submit" class="product__big-button product__big-button--border m-margin-top" value="Send">
  </div>
</form>
</div>