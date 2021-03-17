<?php
/*
  Template Name: Projets
  Description : Projets de l'entreprise
*/
//ajout du header

get_header();

?>
<!----> 
<div class="project-sec">
	 <div class="container">
		 <h2><?php the_title();?></h2>
		  <div class="works">
	  		<?php 
				$args = array(
					'post_type' => 'projet',
					'posts_per_page' => -1,
					'order' => 'DESC',
					'orderby' => 'Date',
				);
				$cmpt = 1;
				$my_query = new WP_Query($args);
				if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();
				
			?>		  
			  <div class="prjt-grid">
				 <div class="box maxheight">
				 	<div class="redim_img_liste">
					  <a class="example-image-link" href="<?php the_post_thumbnail_url() ?>" data-lightbox="example" data-title="<?php the_title();?>."><img class="example-image" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>"></a>
					</div>
					  <div class="project-info">
					   <a href="<?php the_permalink();?>"><?php the_title();?></a>
				    	<?php 
				    		if (get_field('extrait')) :
				    			?>
				    			<p>
					    			<?php
					    			the_field('extrait');
					    			?>
				    			</p>
				    			<?php
				    		else :
				    			the_excerpt();
				    		endif;
				    	?>
					  </div>
				 </div>
			  </div>

			  <?php if ($cmpt%3 === 0) :
			  	?>
			 		<div class="clearfix"></div>
			 	<?php
			 	endif;
			   ?>
			   
			<?php
				$cmpt ++;
				endwhile;
				endif;
				wp_reset_postdata();
			?>
          </div>
	 </div>
</div>
<?php
//ajout du footer
get_footer();