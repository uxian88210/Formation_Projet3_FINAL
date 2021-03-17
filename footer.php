	
	<div class="footer">
			 <div class="container">
				 <div class="footer-sec">
				 	<?php 
						if(have_rows('footer', 'option')): while( have_rows('footer', 'option') ) : the_row();
					?>
					 <div class="col-md-4 ftr-grid1">
						 <h3><?php the_sub_field('footer_twitter', 'option') ?></h3>
						<?php 
							if(have_rows('footer_tweet', 'option')): while( have_rows('footer_tweet', 'option') ) : the_row();
						?>
							 <div class="twts">
								 <h5><?php the_sub_field('footer_tweet_description', 'option') ?>.</h5>
								 <a href="https://twitter.com/intent/tweet?button_hashtag=<?php the_sub_field('footer_tweet_hastag', 'option') ?>&ref_src=twsrc%5Etfw" class="twitter-hashtag-button" data-show-count="false">Tweet #<?php the_sub_field('footer_tweet_hastag', 'option') ?></a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
							 </div>
						<?php 
				 			endwhile; //FIN $footer_tweet
				 			endif; //FIN $footer_tweet
						?>
					 </div>
					 <div class="col-md-4 news-ltr">
						 <h3><?php the_sub_field('footer_newsletter_titre', 'option') ?></h3>
						 <p><?php the_sub_field('footer_newsletter_description', 'option') ?>.</p>
						 <form>					 
							  <input type="text" class="text" value="Enter Email" placeholder="<?php the_sub_field('footer_newsletter_placeholder', 'option') ?>">
							 <input type="submit" value="<?php the_sub_field('footer_newsletter_bouton', 'option') ?>">
							 <div class="clearfix"></div>
						 </form>
					 </div>
					 <div class="col-md-4 social">
						 <h3><?php the_sub_field('footer_titre', 'option') ?></h3>
						 <?php 
							if(have_rows('footer_reseaux', 'option')): while( have_rows('footer_reseaux', 'option') ) : the_row();
						?>

							<a target="blank" href="<?php the_sub_field('footer_reseaux_lien', 'option') ?>"><?php the_sub_field('footer_reseaux_icone', 'option') ?></a>

						<?php 
				 			endwhile; //FIN $footer_reseaux
				 			endif; //FIN $footer_reseaux
						?>
					 </div>
					<?php 
			 			endwhile; //FIN $footer
			 			endif; //FIN $footer
					?>
					 <div class="clearfix"></div>
		     	 </div>
			 </div>
		</div>
		<!---->  
		<div class="copywrite">
			 <div class="container">
				 <div class="ftr-logo">
					 <h3><a href="<?php echo home_url(); ?>"><?php echo strtoupper(get_field('nom', 'options')) ?></a></h3>
				 </div>
				 <div class="ftr-right">
					 <p>Copyright &copy; <?php the_time('Y'); ?> <?php echo ucfirst(get_field('nom', 'options')) ?>. All rights reserved | Design by <a href="http://w3layouts.com">W3layouts</a></p>
				 </div>
				 <div class="clearfix"></div>
			 </div>
		</div>

		<?php wp_footer();?>
		
	</body>
</html>