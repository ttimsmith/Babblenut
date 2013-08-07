<?php get_header(); ?>

<?php remove_filter('the_content', array(&$podPress, 'insert_content')); ?>

<main class="site__content" role="main">
	
	<?php get_sidebar('single'); ?>

	<section class="content__main-column">
		
		<?php if (have_posts()) : the_post(); ?>
			
			<article class="entry">
				<h2>#<?php the_field('episode_number');?>: <?php the_title(); ?></h2>
				<p class="pubdate">
					<time datetime="<?php the_time('Y-m-d'); ?>"><?php the_time('F jS, Y');?></time> 
					<?php if( get_field('episode_hours') || get_field('episode_minutes')) : ?>
					 &middot; 
					<?php endif; ?>

					<?php if( get_field('episode_hours')) : ?>
						<?php the_field('episode_hours'); ?> hour
					<?php endif; ?> 

					<?php if( get_field('episode_minutes')) : ?>
						<?php the_field('episode_minutes'); ?> minutes
					<?php endif; ?>
				</p>

				<p><?php the_field('episode_lead'); ?></p>

				<?php if(get_field('episode_sponsor')) : ?>
					<div class="entry__sponsor">
						<p><strong>This week’s Babblenut is brought to you by:</strong></p>
						<p><?php the_field('episode_sponsor'); ?></p>
					</div>
					<hr>
				<?php endif; ?>
				
				<?php if (is_preview()) : ?>
				  <p>You are viewing the preview page for Episode <?php the_field('episode_number'); ?>. This show will be published soon.</p>
				<?php endif; ?>

				<?php if ( TRUE == isset($podPress) ) { echo apply_filters('babblenut_player', '[display_podcast]' ); } ?>
				
				<h3>Show Notes</h3>
				<?php the_content(); ?>

			</article>

		<?php endif; ?>

	</section><!-- .content__main-column -->
</main><!-- .site__content -->


<?php get_footer(); ?>
