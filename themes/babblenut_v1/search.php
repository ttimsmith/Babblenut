<?php get_header(); ?>

	<main class="site__content" role="main">
		
		<?php get_sidebar(); ?>

		<section class="content__main-column">
						
			<h1 class="page-title">Search Results for: <?php the_search_query(); ?></h1>
			
			<div class="posts">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article class="entry">
						<h2><a href="<?php the_permalink(); ?>" title="Link to <?php the_title(); ?>">#<?php the_field('episode_number');?>: <?php the_title(); ?></a></h2>
						<p class="pubdate">
							<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F jS, Y');?></time> &middot; 
							<?php if( get_field('episode_hours')) : ?><?php the_field('episode_hours'); ?> hour<?php endif; ?> <?php the_field('episode_minutes'); ?> minutes
						</p>
						
						<?php the_excerpt(); ?>
					</article>

				<?php endwhile; ?>

				<?php else : ?>

					<div class="entry">
						<p>No posts found. Try a different search?</p>
					</div>

				<?php endif; ?>

			</div><!-- .posts -->

			<div class="page__navigation">
				<?php wp_pagenavi(); ?>
			</div>

		</section><!-- .content__main-column -->
	</main><!-- .site__content -->


<?php get_footer(); ?>