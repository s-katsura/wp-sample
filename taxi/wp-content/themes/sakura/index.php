<?php get_header(); ?>

<div id="content">
  <div class="container">
    <?php
    if(is_front_page()) {
      get_template_part('template/contents', 'home');
    } elseif (is_page('お知らせ一覧')) {
      get_template_part('template/contents', 'single-all');
    } elseif (is_page()) {
      get_template_part('template/contents', 'page');
    } elseif (is_single()) {
      get_template_part('template/contents', 'single');
    } elseif (is_404()) {
      get_template_part('template/contents', '404');
    }
    ?>
  </div>
</div>
<?php get_template_part('template/backtotop'); ?>

<?php get_footer(); ?>