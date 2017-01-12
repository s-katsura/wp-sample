<?php if(have_posts()): ?>
<div class="col-md-12">
	<section class="well">
		<h2>お知らせ</h2>
		<?php while ( have_posts() ): the_post(); ?>
		<h3><?php the_title(); ?></h3>
		<p class="text-right">
			<small>
				<span class="date"><?php the_time('Y年m月d日'); ?></span>
			</small>
		</p>
		<?= the_content() ?>
		<?php endwhile; ?>
	<br><p><a href="<?php echo home_url(); ?>/information/">≫ 一覧</a></p>
	</section>
</div>
<?php else:?>
<p>表示する記事はありませんでした。</p>
<?php endif; wp_reset_query(); ?>

