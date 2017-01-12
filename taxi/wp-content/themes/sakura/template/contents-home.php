<div id="front-page">
	<div class="row">
		<?php // 5つの安心 4 reassurance
		$args = array(
			'page_id' => 4,
			'post_status' => 'private'
		);
		query_posts($args);
		?>
		<?php if(have_posts()): ?>
		<div id="reassurance" class="clearfix">
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
		<?php endif; wp_reset_query(); ?>

		<?php // 営業エリア 8
		$args = array(
			'page_id' => 8,
			'post_status' => 'private'
		);
		query_posts($args);
		?>
		<?php if(have_posts()): ?>
		<div id="area" class="clearfix">
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
		<?php endif; wp_reset_query(); ?>

		<?php // 運転代行の料金 10
		$args = array(
			'page_id' => 10,
			'post_status' => 'private'
		);
		query_posts($args);
		?>
		<?php if(have_posts()): ?>
		<div id="fee" class="clearfix">
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
		<?php endif; wp_reset_query(); ?>

		<?php // 運転代行サービスの流れ 23
		$args = array(
			'page_id' => 23,
			'post_status' => 'private'
		);
		query_posts($args);
		?>
		<?php if(have_posts()): ?>
		<div id="flow" class="clearfix">
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
		<?php endif; wp_reset_query(); ?>

		<?php // 運転代行とは 21
		$args = array(
			'page_id' => 21,
			'post_status' => 'private'
		);
		query_posts($args);
		?>
		<?php if(have_posts()): ?>
		<div id="about" class="clearfix">
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
		<?php endif; wp_reset_query(); ?>

		<?php // 代行運転のしくみ 12
		$args = array(
			'page_id' => 12,
			'post_status' => 'private'
		);
		query_posts($args);
		?>
		<?php if(have_posts()): ?>
		<div id="system" class="clearfix">
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
		<?php endif; wp_reset_query(); ?>
		<div id="info">
			<div class="col-md-4">
				<?php
				$paged = get_query_var('paged');
				$args = array(
					'posts_per_page' => '5',
					'category_name' => '',
					'orderby' => 'date',
					'order' => 'DESC',
					'post_type' => 'post',
					'post_status' => 'publish',
					'paged' => $paged
				);
				query_posts($args);
				?>
				<section class="well">
					<h2>お知らせ</h2>
					<?php if(have_posts()): while ( have_posts() ): the_post(); ?>
					<h3>
						<span class="date"><?php the_time('Y年m月d日'); ?></span> 
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
					<?php endwhile; else:?>
					<p>表示するお知らせはありませんでした。</p>
					<?php endif; wp_reset_query(); ?>
					<a href="<?php echo home_url(); ?>/information/">≫ 一覧</a>
				</section>
			</div>
		</div>

		<?php // ドライバースタッフ募集 17
		$args = array(
			'page_id' => 17,
			'post_status' => 'private'
		);
		query_posts($args);
		?>
		<?php if(have_posts()): ?>
		<div id="recruit">
			<div class="col-md-4">
				<section class="well">
					<?php while ( have_posts() ): the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
					<?php endwhile; ?>
				</section>
			</div>
		</div>
		<?php else:?>
		<?php endif; wp_reset_query(); ?>

		<?php // STOP！！ 飲酒運転 19
		$args = array(
			'page_id' => 19,
			'post_status' => 'private'
		);
		query_posts($args);
		?>
		<?php if(have_posts()): ?>
		<div id="stop">
			<div class="col-md-4">
				<section class="well">
					<?php while ( have_posts() ): the_post(); ?>
					<h2><?php the_title(); ?></h2>
					<?php the_content(); ?>
					<?php endwhile; ?>
				</section>
			</div>
		</div>
		<?php else:?>
		<?php endif; wp_reset_query(); ?>

	</div><!-- /row -->
</div><!-- /front-page -->









