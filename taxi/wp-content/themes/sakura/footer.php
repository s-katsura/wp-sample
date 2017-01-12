<footer>
  <div class="container">
    <div class="row">
      <div class="col-sm-6">
    <?php
    wp_nav_menu(
      array(
        'theme_location' => 'foot_nav',
        'container' => false ,
        'items_wrap' => '<ul class="clearfix">%3$s</ul>'
      )
    );
    ?>
      </div>
      <div class="col-sm-6 text-right">
        <address>
          <p>運転代行のご依頼・ご予約はこちら<br>
          <img class="img-responsive" src="<?= get_template_directory_uri() ?>/dist/img/img-logo.svg" alt="下関の運転代行 さくら交通">
          山口県下関市豊前田町1-1-15 KB2ビル1F<br>
        TEL <a href="tel:0832227733">083-222-7733</a><br>
        月～土 17：30～4：00頃 / 日・祝17：30～2：00頃</p>
        </address>
      </div>
      <div class="col-sm-12">
        <p class="copy text-center">© 2016-<?php echo date("Y"); ?> Sakura Transportation.com All rights reserved.</p>
      </div>
    </div>
  </div>
</footer>

<div id="tel-nav" class="visible-xs">
  <a href="tel:0832227733">&phone; 083-222-7733</a>
  月～土 17：30～4：00頃 / 日・祝17：30～2：00頃
</div>

<?php wp_footer(); ?>
<?php // global $template; echo $template; ?>
</body>
</html>