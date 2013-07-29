<aside class="content__sidebar" role="complementary">
	<figure class="sidebar__artwork">
		<a href="/"><img src="http://placehold.it/500" alt="Babblenut Artwork"></a>
	</figure>
	<div class="sidebar__info">
		<div class="info__module">
			<ul class="useful-links">
				<!-- <li><a href="#">
					<span data-icon="i" aria-hidden="true"></span>
					<span>Subscribe via iTunes</span>
				</a></li> -->
				<li><a href="/feed/bytesize/">
					<span data-icon="r" aria-hidden="true"></span>
					<span>Subscribe via RSS</span>	
				</a></li>
				<li><a href="/sponsorship">
					<span data-icon="h" aria-hidden="true"></span>
					<span>Sponsor Babblenut</span>
				</a></li>
			</ul><!-- .useful-links -->		
		</div><!-- .info__module -->

		<div class="info__module">
			<h4>Hosted By</h4>
			<div class="module__host">
				<figure class="host__image">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/paul_100.png" alt="Paul Armstrong">
				</figure>
				<h5><a href="http://paularmstrong.me">Paul Armstrong</a></h5>
				<p><a href="https://twitter.com/wiseacre" class="twitter-follow-button" data-show-count="false" data-dnt="true">Follow @wiseacre</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></p>
			</div> <!-- .module__host -->

			<div class="module__host">
				<figure class="host__image">
					<img src="<?php bloginfo('template_url'); ?>/assets/img/tim_100.png" alt="Paul Armstrong">
				</figure>
				<h5><a href="http://ttimsmith.com">Tim Smith</a></h5>
				<p><a href="https://twitter.com/ttimsmith" class="twitter-follow-button" data-show-count="false" data-dnt="true">Follow @ttimsmith</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script></p>
			</div><!-- .module__host -->
		</div><!-- .info__module -->

		<div class="info__module">
			<h4>Episode Navigation</h4>
			<nav class="episode__nav">
				<p><?php previous_post_link('%link', 'Previous', TRUE); ?>
				<?php if(!get_adjacent_post(true, '', true)) { 
				  echo '<span class="inactive">Previous</span>'; 
				} ?>
				&middot;
				<?php next_post_link('%link', 'Next', TRUE); ?>
				<?php if(!get_adjacent_post(true, '', false)) { 
				  echo '<span class="inactive">Next</span>'; 
				} ?></p>
			</nav>
		</div>

		<div class="info__module">
			<h4>Share</h4>
			<ul class="sharing-links">
				<li><a href="http://twitter.com/home?status=Babblenut <?php the_field('episode_number');?> with @wiseacre and @ttimsmith: <?php the_title(); ?> - <?php the_permalink(); ?>" title="Share on Twitter" target="_blank">Share on Twitter</a></li>
				<li><a href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&t=<?php the_title(); ?>" title="Share on Facebook" target="blank">Share on Facebook</a></li>
				<?php if ( is_user_logged_in() ) : ?>
				<li><a href="http://twitter.com/home?status=Just posted: Babblenut <?php the_field('episode_number');?> with @wiseacre and @ttimsmith - <?php the_permalink(); ?>" title="Share on Twitter" target="_blank">Admin Tweet</a></li>
				<?php endif; ?>
			</ul>
		</div>

	</div><!-- .sidebar_info -->

</aside>	