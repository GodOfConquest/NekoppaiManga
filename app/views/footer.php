<!-- footer -->
<div class="row">

  <div class="col-sm-6">
    <p>
      <?php echo do_shortcode(C('app.footerLeft')) ?> | Powered by Aftershock | <a class="btn btn-default" href="/index" target="_blank"> <i class="icon-download"></i>Download Nekoppaimanga</a>
    </p>
  </div>

  <div class="col-sm-6 text-right">
    <p>
      <?php echo do_shortcode(C('app.footerRight')) ?>  
    </p>
  </div>
</div>
<!-- /footer -->

<?php 
	$customJs .= ' extended = new Extended();'; 
  if(!is_array($jsFiles['local'])) $jsFiles['local'] = array();
  array_unshift($jsFiles['local'], 'acp/assets/js/jquery-2.1.1.min.js');
	$jsFiles['local'][] = 'acp/assets/js/bootstrap.min.js';
  $jsFiles['local'][] = 'app/assets/js/manga.js';
	$jsFiles['local'][] = 'acp/assets/js/custom.js';
	$jsFiles['local'][] = 'acp/assets/js/extended.min.js'; 
  $customJs .= ' $(window).load(function(){
                  $(".window .window-body").mCustomScrollbar({
                    theme: "minimal-dark", // dark, light, minimal, minimal-dark
                    scrollButtons:{
                      enable: true //or false
                    }
                  });
                });';
?>

<?php echo event('js', $jsFiles); ?>
<?php echo event('customJs', $customJs); ?>


