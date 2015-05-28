  <?php echo $header ?>
  <body>

    <div id="blog-page">
      <div class="container">

      	<?php echo $topHeader ?>

    	  <?php echo $navigator ?>
        
        <!-- article area -->
        <div class="row">

          <div class="col-md-9">	

            <?php echo C('app.ads2') ?>

          	<?php echo $content ?>

            <div class="clearfix"></div>
            <?php echo C('app.ads3') ?>
			
			<!-- IKLAN Unik Unik -->
			<div style='align:center;'>
			<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
			<!-- 468x60 -->
			<ins class="adsbygoogle"
			style="display:inline-block;width:468px;height:60px"
			data-ad-client="ca-pub-2609750099023039"
			data-ad-slot="8140168506"></ins>
			<script>
			(adsbygoogle = window.adsbygoogle || []).push({});
			</script>
			</div>
			<!-- END IKLAN Unik Unik -->	
			
          </div>
          <div class="col-md-3">

          <?php echo $sidebar ?>

          </div>
        </div>
        <!-- /article area -->

		  <!-- footer and copyright -->
      <div class="clearfix"><br /><br /></div>
    	<?php echo $footer ?>

      </div>
    </div>

  </body>
  </html>