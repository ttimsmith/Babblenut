<?php get_header(); ?>

	<main class="site__content" role="main">
		
		<?php get_sidebar(); ?>

		<section class="content__main-column">
			<div class="description">
				<h1>Babblenut</h1>
				<p>A topical show to empower, entertain, and inspire people to be more, learn more, and try more. It's also better than a punch in the face.</p>
			</div>

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

						<article class="entry no-posts">
							<p>We’re getting things ready and taking off the bubble wrap. Stay tuned, an episode will be live soon!</p>
						</article>	

					<?php endif; ?>

			</div><!-- .posts -->

			<div class="page__navigation">
				<?php wp_pagenavi(); ?>
			</div>

		</section><!-- .content__main-column -->
	</main><!-- .site__content -->


<?php get_footer(); ?>