<?php
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
$args = array(
		'posts_per_page' => 20,
		'order' => 'desc',
		'post_type' => 'post',
		'paged' => $paged
);
query_posts($args);
?>

<?php if(have_posts()): ?>
<div class="col-md-12">
	<section class="well">
		<h2>お知らせ一覧</h2>
		<?php while ( have_posts() ): the_post(); ?>
		<h3>
			<small>
				<span class="date"><?php the_time('Y年m月d日'); ?></span>
			</small>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h3>
		<?php endwhile; ?>
		<?php the_posts_pagination(); ?>
	</section>
</div>
<?php else:?>
<p>表示する記事はありませんでした。</p>
<?php endif; wp_reset_query(); ?>

