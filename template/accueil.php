<?php
/*
  Template Name: Accueil
  Description : page d'accueil
*/
//ajout du header personnaliser
//get_header('accueil');

get_header('accueil');

?>
		<!----> 
		<div class="content">
			 <div class="container">
				 <div class="content-grids">
					 <div class="col-md-5 content-left">
					 	 <!--on recupere le champ titre -->
					 <?php
					 //$liste = get_field('liste');

					 while( have_rows('liste') ) : the_row();
					 ?>

						  <div class="cntnt-head">
							  <h3><?php echo ucfirst(get_sub_field('liste_titre_principal')) ?></h3>
							  <span></span>
						  </div>

						  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
						  	<?php 
							//$sous_liste = get_sub_field('sous_liste');
							$compt = 1;
							if(have_rows('sous_liste')): while( have_rows('sous_liste') ) : the_row();
							 	
							?>
							<div class="panel panel-default">
								<div class="panel-heading" role="tab" id="heading<?php echo $compt ?>">
								  <h4 class="panel-title">
									<a 	role="button" 
										data-toggle="collapse"
										data-parent="#accordion" 
										href="#collapse<?php echo $compt ?>"  
										aria-controls="collapse<?php echo $compt ?>"
										<?php 
											if ($compt === 1) {
												?> aria-expanded="true" <?php
											} else {
												?> aria-expanded="false" class="collapsed"<?php
											}
										 ?>
									>
									  <?php echo ucfirst(get_sub_field('liste_titre'))?>
									</a>
								  </h4>
								</div>
								<?php $in = 'in' ?>

								
								<div id="collapse<?php echo $compt ?>" class="panel-collapse collapse <?php if($compt === 1):echo 'in'; endif;?>" role="tabpanel" aria-labelledby="heading<?php echo $compt ?>">
									<div class="panel-body">
										<?php the_sub_field('liste_paragraphe_1')?>
									</div>
									<?php if(get_sub_field('liste_paragraphe_2')) {?>
										<div class="panel-body">
											<?php the_sub_field('liste_paragraphe_2');?>
										</div>
									<?php } ?>
								</div>
							</div>
							<?php 
					 			$compt += 1;
					 			endwhile; //FIN $sous_liste
					 			endif; //FIN $sous_liste
							?> 					   			  
						  </div>
					 <?php endwhile; //FIN $liste (pas de if sur cette boucle)?>
					 </div>


					<div class="col-md-7 content-right">
				 	<?php 
					//$caracteristiques = get_field('caracteristiques');

					while(have_rows('caracteristiques')) : the_row();
					?>

						 <div class="cntnt-head">
							  <h3><?php echo ucfirst(get_sub_field('caracteristiques_titre')) ?></h3>
							  <span></span>
						  </div>

						  <?php 
						  //$caracteristiques_liste = get_sub_field('caracteristiques_liste');
						  $cmpt = 1;
						  if(have_rows('caracteristiques_liste')): while( have_rows('caracteristiques_liste') ) : the_row();
						  	//on formate le glyphicon au cas au l'utilisateur aurais copier
						  	//"glyphicon glyphicon-mon-icone"
						  	//comme cela on est sur de ne pas faire de doubon dans la class
						  	$glyphicon = get_sub_field('caracteristiques_liste_glyphicons');
						  	$glyphicon = str_replace('glyphicon ', '', $glyphicon);
						  ?>
							  <?php if ($cmpt%2 === 1):?>
							  	<!--on commance la div tout les 2 tour de boucle, donc on verifie si c'est un tour pair-->
							  	<div class="icon-grids"><!--div ligne-->
							  <?php endif ?>
								   <div class="col-md-6 futr-grid <?php if($cmpt%2 === 1):echo'futr1'; endif;?>">
									 <div class="icon-pic">
										 <div class="icon text-center">
											 <span class="glyphicon <?php echo $glyphicon ?>" aria-hidden="true"></span>
										 </div>
									 </div>
									 <div class="icon-info">
										 <h4><a href="#"><?php echo ucfirst(get_sub_field('caracteristiques_liste_titre')) ?></a></h4>
										 <span></span>
										 <p><?php the_sub_field('caracteristiques_liste_description') ?></p>
									 </div>
									 <div class="clearfix"></div>
								  </div>

							  <?php if($cmpt%2 != 1):?>
							  	<!--on ferme la div tout les 2 tour de boucle, donc on verifie si c'est un tour impaire-->
								  <div class="clearfix"></div>
							  </div><!--FIN div ligne-->
							  <?php endif ?>

						  <?php
					 		$cmpt += 1;
					 		endwhile; //FIN caracteristiques_liste
					 	 	endif; //FIN caracteristiques_liste
						  ?>

					 <?php endwhile; //FIN $caracteristiques (pas de if sur cette boucle)?>				  
					 </div>
					 <div class="clearfix"></div>
				 </div>
			 </div>
		</div>
		<!---->
		<div class="service">
			 <div class="container">
			 	<?php 
					//$services = get_field('services');
					
					if (have_rows('services')) : while(have_rows('services')) : the_row();
				?>
				 <h3><?php the_sub_field('services_titre') ?></h3>
				  <div class="works">			  
					  
				  	<?php 
						//$services_card = get_sub_field('services_card');

						if (have_rows('services_card')) : while(have_rows('services_card')) : the_row();
							$images = get_sub_field('services_card_image');
					?>
					 <div class="prjt-grid">
						 <div class="box maxheight">
							  <a class="example-image-link" href="<?php echo $images['url'] ?>" data-lightbox="example" data-title="<?php echo ucfirst(get_sub_field('services_card_titre')) ?>."><img class="example-image" src="<?php echo $images['url'] ?>" alt="<?php echo $images['title'] ?>"></a>
							  <div class="project-info">
							   <a href="<?php the_sub_field('services_card_lien') ?>"><?php echo ucfirst(get_sub_field('services_card_titre')) ?></a>
							   <p><?php the_sub_field('services_card_description') ?></p>
							  </div>
						 </div>
					 </div>

						<?php
					 		endwhile; //FIN services_card
					 	 	endif; //FIN services_card
						?>

					 <div class="clearfix"></div>
				 </div>

				 <?php
			 		endwhile; //FIN services
			 	 	endif; //FIN services
				 ?>

			 </div>	
		</div>	
	 			 
		<!---->
		<div class="content-bottom">
			 <div class="container">
				  <div class="wlid-sec">
					 <div class="col-md-6 news">
					 	<?php 
							//$news = get_field('news');
							
							if (have_rows('news')) : while(have_rows('news')) : the_row();
						?>
						 <div class="news-head">
							 <h3><?php echo ucfirst(get_sub_field('news_titre')) ?></h3>
							 <span></span>
						 </div>
						 	<?php 
								//$news_nouvelle = get_field('news_nouvelle');
								
								if (have_rows('news_nouvelle')) : while(have_rows('news_nouvelle')) : the_row();
									$images = get_sub_field('news_nouvelle_image');
							?>

							 <div class="news_sec">
								 <img src="<?php echo $images['url']?>" class="img-responsive" alt="<?php echo $images['title']?>"/>
								 <h3><a href="#"><?php the_sub_field('news_nouvelle_titre') ?></a></h3>
								 <p><?php the_sub_field('news_nouvelle_description') ?></p>
								 <?php if (get_sub_field('news_nouvelle_description_lien')) {

								 	$lien = get_sub_field('news_nouvelle_description_lien');

								 	?>
								 		
								 		<a class="read" href="<?php echo $lien['url'] ?>"><?php echo $lien['title'] ?></a>

								 	<?php
								 } ?>
							 </div>
							 <?php
						 		endwhile; //FIN news_nouvelle
						 	 	endif; //FIN news_nouvelle
							 ?>
						 <?php
					 		endwhile; //FIN news
					 	 	endif; //FIN news
						 ?>
					 </div>
					 <div class="col-md-6 testimonal">
					 	<?php 
							//$temoignages = get_field('temoignages');
							
							if (have_rows('temoignages')) : while(have_rows('temoignages')) : the_row();
						?>
						 <div class="testi-head">
							 <h3><?php echo ucfirst(get_sub_field('témoignages_titre')) ?></h3>
							 <span></span>
						 </div>

						 <div class="testi-grids">
						 	<?php 
								//$témoignages_card = get_sub_field('témoignages_card');
								$cmpt = 1;
								if (have_rows('témoignages_card')) : while(have_rows('témoignages_card')) : the_row();
									$images = get_sub_field('témoignages_card_image');
							?>
							 <div class="testi-grid  <?php if($cmpt !== 1) : echo "testi2" ;endif; ?>">
								 <div class="people">
									 <img src="<?php echo $images['url']?>" class="img-responsive" alt="<?php echo $images['title']?>"/>
								 </div>
								 
								 <div class="testi-info">
									 <h4><?php echo ucfirst(get_sub_field('témoignages_card_nom'))?></h4>
									 <!--lien pour tester la page erreur 404-->
									 <a href="projects.html"><?php echo ucfirst(get_sub_field('témoignages_card_poste'))?></a>
									 <p><?php the_sub_field('témoignages_card_description')?></p>
								 </div>
								 <div class="clearfix"></div>
							 </div>
							 <?php
							 	$cmpt ++;
						 		endwhile; //FIN témoignages_card
						 	 	endif; //FIN témoignages_card
							 ?>
						 </div>
						 <?php
					 		endwhile; //FIN temoignages
					 	 	endif; //FIN temoignages
						 ?>
					 </div>
					 <div class="clearfix"></div>
				  </div>
			 </div>
		</div>
		<!---->
<?php
//ajout du footer
get_footer();