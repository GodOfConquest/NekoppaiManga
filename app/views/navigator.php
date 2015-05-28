<!-- navigation area -->
<div class="row">
  <div class="col-sm-12">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
           <?php echo do_shortcode(C('app.menu')) ?>
          </ul>
           <ul class="nav navbar-nav navbar-right">
            <?php if(!is_array(session('thisUser'))): ?>
              <li><a href="<?php echo URL('register') ?>"><?php echo T('Register') ?></a></li>
              <li><a href="<?php echo URL('login') ?>"><?php echo T('Login') ?></a></li>
            <?php else: ?>
                <li class="dropdown">
                  <a class="dropdown-toggle text-notransform" data-toggle="dropdown" href="#">
                    <img src="<?php echo URL(session_get('preferences', 'avatar')) ?>" width="24px">&nbsp;&nbsp;
                    <?php echo session_get('thisUser', 'username') ?> <span class="caret"></span>
                  </a>
                  <ul class="dropdown-menu" aria-labelledby="download">
                    <li><a href="<?php echo URL(T('setting-slug', 'settings')) ?>"><?php echo T('Settings') ?></a></li>
                    <?php echo event('user_menu', '') ?>
                    <li class="divider"></li>
                  <li><a href="<?php echo URL('logout') ?>"><?php echo T('Logout') ?></a></li>
                  </ul>
                </li>
            <?php endif; ?>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container-fluid -->
    </nav>
  </div>
</div>
<!-- /navigation area -->