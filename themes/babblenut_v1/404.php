<?php @header("HTTP/1.1 404 Not found", TRUE, 404); ?>
<?php get_header() ?>

<main class="site__content" role="main">

	<section class="content__main-column">
		<?php the_post(); ?>

		<div class="entry">
			<h1><small>Uh oh!</small>404</h1>

			<p>Seems like you’re in the wrong part of town. Should something be here? <a href="/contact">Let us know</a>.</p>
      
		</div><!-- .entry -->

	</section><!-- .content__main-column -->
</main><!-- .site__content -->


<?php get_footer(); ?>