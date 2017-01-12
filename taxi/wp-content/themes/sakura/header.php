<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php wp_title( '|', true, 'right' ); ?></title>

<link rel="apple-touch-icon" sizes="180x180" href="<?php echo esc_url(get_template_directory_uri()); ?>/apple-touch-icon-180x180.png">
<link rel="icon" href="<?php echo esc_url(get_template_directory_uri()); ?>/favicon.ico" type="image/vnd.microsoft.icon">
<link rel="icon" type="image/png" href="<?php echo esc_url(get_template_directory_uri()); ?>/android-chrome-192x192.png" sizes="192x192">
<meta name="msapplication" content="<?php echo esc_url(get_template_directory_uri()); ?>/mstile-144x144.png">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<?php get_template_part('template/ogp'); ?>

<?php wp_head(); ?>
</head>
<body>

<header>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-sm-6 hidden-xs">
        <h1>下関の運転代行なら信頼と実績のさくら交通</h1>
        <a href="<?= home_url(); ?>">
          <img class="img-responsive" src="<?php echo get_template_directory_uri(); ?>/dist/img/img-logo.svg" width="309" height="50" alt="下関の運転代行 さくら交通">
        </a>
      </div>
      <div class="col-md-6 col-sm-6 hidden-xs text-right">
        <p class="tel">TEL <span><a href="tel:0832227733">083-222-7733</a></span></p>
        <p class="time"><span>月～土 17：30～4：00頃 / 日・祝17：30～2：00頃</span></p>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-default">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <div class="visible-xs">
            <a href="<?= home_url(); ?>"><img class="" src="<?php echo get_template_directory_uri(); ?>/dist/img/img-logo.svg" width="309" height="50" alt="下関の運転代行 さくら交通"></a>
            <h1 class="clearfix">下関の運転代行なら信頼と実績のさくら交通</h1>
        </div>
      </div>

      <div class="collapse navbar-collapse" id="navbar-collapse">
        <?php
        wp_nav_menu(
          array(
            'theme_location' => 'main_nav',
            'container' => false ,
            'items_wrap' => '<ul class="nav navbar-nav">%3$s</ul>'
          )
        );
        ?>
        <p class="visible-xs">TEL <span><a href="tel:0832227733">083-222-7733</a></span></p>
      </div><!-- /.navbar-collapse -->
    </div>
  </nav>
</header>


<?php if(is_front_page()): ?>
<div id="mainvisual">
  <div class="container">
    <img class="img-responsive center-block" src="<?php echo get_template_directory_uri(); ?>/dist/img/img-mainvisual.jpg" width="1140">
    <div id="catch">
      <ul>
        <li>飲んでも安心！運転代行！</li>
        <li>下関No.1のおもてなし!</li>
        <li>GPSデジタル配車システム！</li>
        <li>料金メーター&領収書発行で安心！</li>
        <li>駐車料金無料！愛車をお預かりします！</li>
        <li>飲む前から代行手配！</li>
        <li>安心の代行保険加入!</li>
      </ul>
      <p>お客様の大切なお車を安全・迅速にご自宅までお届けします。</p>
    </div>
  </div>
</div>
<?php endif; ?>