<?php get_header(); ?>

	<main class="site__content" role="main">
		
		<?php get_sidebar(); ?>

		<section class="content__main-column">
			<?php the_post(); ?>

			<div class="entry">
				<?php if(get_field('live_show', 'options')) : ?>
				    
		      <h1 class="page-title">On Air</h1>
				    
		    <?php else : ?>

		      <h1 class="page-title">Off the Air</h1>

		    <?php endif; ?>

	      <?php if (get_field('live_show', 'options')) : ?>
	        <p>
	          Babblenut #<?php the_field('live_episode_number', 'options'); ?> with Paul Armstrong &amp; Tim Smith &middot;
	      
	      <?php if ( is_user_logged_in() ) : ?>
	        <a href="http://twitter.com/home?status=On Air: Babblenut <?php the_field('live_episode_number', 'options'); ?> with @wiseacre and @ttimsmith - <?php the_permalink(); ?>" target="_blank">Admin Tweet</a></p>
	      <?php endif; ?>

	      <?php else : ?>
	    
	      	<p>This show broadcasts live Wednesdays at 5pm US Central time.</p>

		    <?php endif; ?>

	      <?php if(get_field('live_show', 'options')) : ?>
	        <audio class="live-audio" autoplay name="media"><source src="http://108.163.197.114:8189/;&lang=en&codec=mp3&volume=75&tracking=false&skin=/ffmp3/ffmp3-mcclean.xml&title=The+East+Wing&jsevents=false&welcome" type="audio/mpeg"></audio>
	        <hr>
	      <?php endif; ?>

	      
	    <iframe src="http://webchat.freenode.net?channels=towerfm&uio=d4" width="100%" height="400"></iframe>

	      
			</div><!-- .entry -->

		</section><!-- .content__main-column -->
	</main><!-- .site__content -->


<?php get_footer(); ?>