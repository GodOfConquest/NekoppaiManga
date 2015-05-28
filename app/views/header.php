<?php 

  if(!is_array($cssFiles['local'])) $cssFiles['local'] = array();
  array_unshift($cssFiles['local'], 'acp/assets/css/bootstrap.min.css');
  $cssFiles['local'][] = 'acp/assets/css/animation.css';
  $cssFiles['local'][] = 'acp/assets/css/extended.min.css';
  $cssFiles['local'][] = 'acp/assets/css/custom.css';
  $cssFiles['local'][] = 'acp/assets/css/fontello.css';
  $cssFiles['local'][] = 'app/assets/css/manga.css';
  $cssFiles['remote'][] = 'http://fonts.googleapis.com/css?family=Noto+Sans:400,700';
  //$cssFiles['remote'][] = '//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css';

?>

<!DOCTYPE html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title><?php echo $title ?></title>
  <meta name="description" content="<?php echo $description ?>">
  <meta name="keywords" content="<?php echo $keywords ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
  <?php 
    echo event('css', $cssFiles);
    echo event('customCss', $customCss); 
   ?> 
  <!-- Modernizr -->
    <!--[if IE 8]>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.1/modernizr.min.js"></script>
    <![endif]-->
  </head>