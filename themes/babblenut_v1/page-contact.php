<?php get_header(); ?>

	<main class="site__content" role="main">
		
		<?php get_sidebar(); ?>

		<section class="content__main-column">
			<?php the_post(); ?>

			<div class="entry">
				<h1 class="page-title"><?php the_title(); ?></h1>
				<p>Want to say hello, or offer some feedback? Use the form below. If you're interested in sponsorship, please consult the <a href="/sponsorship">Sponsorship page</a>.</p>
				      
	      <?php gravity_form('Contact Form', false, false, false, '', true); ?>
	      
			</div><!-- .entry -->

		</section><!-- .content__main-column -->
	</main><!-- .site__content -->


<?php get_footer(); ?>