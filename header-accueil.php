<!DOCTYPE html>
<html lang="fr">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<?php $icone = get_field('icone_du_site', 'options'); ?>
		<link rel="icon" type="image/png" sizes="16x16" href="<?php echo $icone['url']?>">
		
		<?php wp_head(); ?>
		

	</head>
	
	<body>
		<!-- banner -->
		<div class="banner">
			<?php require('nav.php'); ?>
			<!----> 
			<div class="banner-sec">
				 <div class="banner-grids">
				 	<?php
				 		// on recupere ici le dernier article publier.
						$args = array(
							'post_type' => 'espece',
							'posts_per_page' => 1,
							'order' => 'DESC',
							'orderby' => 'Date',
						);

						$my_query = new WP_Query($args);
						if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();

					?>
						<!--1 article en grand ici le dernier publier TODO refaire le CSS en inversant les balise p et h3 pour un meilleur referencement-->
						<div class="col-md-7 banner-left redim_img_banner_principal">
							<a href="<?php the_permalink();?>">
								<img src="<?php the_post_thumbnail_url() ?>" alt="image de l'article <?php the_title();?>">
							</a>
							<div class="banner_lft_info">
								<p><a href="<?php the_permalink();?>"><?php the_title();?></a></p>				 
								<h3><?php the_field('description_courte')?></h3>
							</div>
						</div>

					<?php
						endwhile;
						endif;
						wp_reset_postdata();
					?>
					 <div class="col-md-5 banner-right">
					 	<?php
				 		// on recupere ici les article 2 a 5.
				 		$cmpt = 1;
						$args = array(
							'post_type' => 'espece',
							'posts_per_page' => 4,
							'offset' => 1,
							'order' => 'DESC',
							'orderby' => 'Date',
						);

						$my_query = new WP_Query($args);
						if ($my_query->have_posts()) : while ($my_query->have_posts()) : $my_query->the_post();

						?>
							 <!--article 2, 3, 4 et 5 en petit TODO refaire le CSS en inversant les balise p et h3 pour un meilleur referencement-->

							 <div class="bnr-right grid redim_img_banner">
							 	 <a href="<?php the_permalink();?>">
							 	 	 <img src="<?php the_post_thumbnail_url() ?>" alt="image de l'article <?php the_title();?>">
							 	 </a>
							 	 <!--si c'est un tour de boucle pair, on "affiche" la class "bnr_rht" en plus-->
								 <div class="banner_rght_info <?php if ($cmpt%2 != 1): echo "bnr_rht"; endif ?>">
									 <p><a href="<?php the_permalink();?>"><?php the_title();?></a></p>				 
									 <h4><?php the_field('description_courte')?></h4>					 
								 </div>
							 </div>

							 <!--si c'est un tour de boucle pair, on "affiche" le clearfix-->
							 <?php if ($cmpt%2 != 1): ?>

							 	<div class="clearfix"></div>

							 <?php endif ?>
							 
						<?php
							endwhile;
							endif;
							wp_reset_postdata();
						?>
					 </div>
					 <div class="clearfix"></div>
				 </div>	 
			</div>
		</div>