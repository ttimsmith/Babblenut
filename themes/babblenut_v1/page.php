<?php get_header(); ?>

	<main class="site__content" role="main">
		
		<?php get_sidebar(); ?>

		<section class="content__main-column">
			<?php the_post(); ?>

			<div class="entry">
				<h1 class="page-title"><?php the_title(); ?></h1>

				<?php the_content(); ?>
	      
			</div><!-- .entry -->

		</section><!-- .content__main-column -->
	</main><!-- .site__content -->


<?php get_footer(); ?>