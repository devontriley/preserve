<?php
$header = get_sub_field('header');
if(!$header){ $header = 'Join the Community'; }
?>
<div class="newsletter-signup">
  <div class="content">
    <h2 class="module-header"><?php echo $header ?></h2>
    <div id="mc_embed_signup">
      <form action="//preservebrands.us16.list-manage.com/subscribe/post?u=7df2ba034c9d88245475dc567&amp;id=58c6176cc6" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
            <div class="mc-field-group">
            	<label for="mce-EMAIL">EMAIL ADDRESS:</label>
            	<input type="email" value="" name="EMAIL" placeholder="example@email.com" class="required email" id="mce-EMAIL">
            </div>
          <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_7df2ba034c9d88245475dc567_58c6176cc6" tabindex="-1" value=""></div>
          <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button">
          <div id="mce-responses" class="clear">
            <div class="response" id="mce-error-response" style="display:none"></div>
            <div class="response" id="mce-success-response" style="display:none"></div>
          </div>
      </form>
    </div>
    <script type='text/javascript' src='//s3.amazonaws.com/downloads.mailchimp.com/js/mc-validate.js'></script><script type='text/javascript'>(function($) {window.fnames = new Array(); window.ftypes = new Array();fnames[0]='EMAIL';ftypes[0]='email';fnames[1]='FNAME';ftypes[1]='text';fnames[2]='LNAME';ftypes[2]='text';}(jQuery));var $mcj = jQuery.noConflict(true);</script>
  </div>
</div>
