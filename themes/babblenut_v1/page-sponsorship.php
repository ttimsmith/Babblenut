<?php get_header(); ?>

	<main class="site__content" role="main">
		
		<?php get_sidebar(); ?>

		<section class="content__main-column">
			<?php the_post(); ?>

			<div class="entry">
				<h1 class="page-title"><?php the_title(); ?></h1>

				<p>Thanks for your interest in sponsoring Babblenut! We're looking for sponsors whose products or services will really benefit our listeners.</p>

	      <h3>The Nitty Gritty</h3>
	      <ul>
	        <li>The show can have up to two sponsor slots. These are done at the top of the show.</li>
	        <li>By sponsoring, you get: a 30&ndash;60 second read at the top of the show, and a permanent link in the show notes (which shows up in the RSS feed).</li>
	      </ul>
	      <p>Fill out the form below, and we'll get back to you as soon as possible!</p>
	      
	      <?php gravity_form('Sponsorship', false, false, false, '', true); ?>
	      
			</div><!-- .entry -->

		</section><!-- .content__main-column -->
	</main><!-- .site__content -->


<?php get_footer(); ?>