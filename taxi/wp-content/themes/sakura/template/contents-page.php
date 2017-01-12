<?php if(have_posts()): ?>
<div class="clearfix">
  <div class="col-md-12">
    <section class="well">
      <?php while ( have_posts() ): the_post(); ?>
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
      <?php endwhile; ?>
    </section>
  </div>
</div>
<?php else:?>
<p>表示する内容はありませんでした。</p>
<?php endif; wp_reset_query(); ?>
