<?php
/*
  Template Name: A propos
  Description : description de l'entreprise
*/
//ajout du header

get_header();

?>
<!----> 
<div class="about">
	 <div class="container">
		 <h2><?php the_title();?></h2>
		 <div class="about-head">
		 	 <?php 
		 	 	$img = get_field('image');
		 	  ?>
			 <img src="<?php echo $img['url'] ?>" class="img-responsive" alt="<?php echo $img['title'] ?>"/>
			 <div class="about-info">
				 <h3><?php the_field('titre_1') ?></h3>
				 <p><?php echo ucfirst(get_field('paragraphe_1')) ?></p>
			 </div>
			 <div class="clearfix"></div>
		 </div>
		 <div class="ministries-sec">
			  	<?php 
					if(have_rows('sujet')): while( have_rows('sujet') ) : the_row(); 	
				?>
				 <div class="col-md-6 what-do">
					 <h3><?php the_sub_field('sujet_titre') ?></h3>
					  <ul>
					  	<?php 
							if(have_rows('sujet_liste')): while( have_rows('sujet_liste') ) : the_row();
								if(get_sub_field('sujet_liste_element_lien')):
									$lien = get_sub_field('sujet_liste_element_lien');
						?>
									<li><a href="<?php echo $lien['url'] ?>"><?php echo $lien['title'] ?></a></li>
								<?php
								elseif(get_sub_field('sujet_liste_element_texte')):
								?>
									<li><?php the_sub_field('sujet_liste_element_texte') ?></li>
								<?php
								endif;
								?>
						<?php 
				 			endwhile; //FIN $sujet_liste
				 			endif; //FIN $sujet_liste
						?>
					 </ul>
				 </div>
	 			<?php 
		 			endwhile; //FIN $sujet
		 			endif; //FIN $sujet
				?>
				 <div class="clearfix"></div>
		  </div>
		  <div class="team">
			  <h3><?php echo ucfirst(get_field('titre_2')) ?></h3>
			    <?php 
					if(have_rows('membres')): while( have_rows('membres') ) : the_row();
					$img = get_sub_field('membres_image');
				?>
				  <div class="grid_4">
						<div class="team-grid">
							<img src="<?php echo $img['url'] ?>" alt="<?php echo $img['title'] ?>">
							<h4><?php the_sub_field('membres_genre') ?> <?php the_sub_field('membres_nom') ?></h4>
							<h4><?php the_sub_field('membres_poste') ?></h4>
							<p><?php the_sub_field('membres_description') ?></p>
						</div>
				  </div>
				<?php 
		 			endwhile; //FIN $membres
		 			endif; //FIN $membres
				?>
			 <div class="clearfix"></div> 
		  </div>			         
	  </div> 
</div>
<!----> 
<?php
//ajout du footer
get_footer();