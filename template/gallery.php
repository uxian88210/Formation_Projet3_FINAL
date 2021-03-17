<?php
/*
  Template Name: Galerie
  Description : galerie photo
*/
//ajout du header

get_header();

?>
<!----> 
<div class="gallery">
		<div class="container">
			<h3><?php the_title();?></h3>
			<div class="gallery-bottom">
				<?php
					$images = get_field('galerie');
					$size = 'full';

					if($images):
						$cmtp = 1;
						foreach($images as $image_id) :
				?>
					
					<?php
						if ($cmtp%4 === 1) {
							?>
								<!--A chaque boucle qui demare un cycle de 4 on crée une div pour la ligne-->
								<div class="gallery-1">
							<?php
						}
					?>		
						<div class="col-md-3 gallery-grid">
							<a class="example-image-link" href="<?php echo $image_id['url'] ?>" data-lightbox="example-set" data-title="<?php echo $image_id['title'] ?>."><img class="example-image" src="<?php echo $image_id['url'] ?>" alt="<?php echo $image_id['title'] ?>"/></a>
						</div>
					
					<?php
						if ($cmtp%4 === 0) {
							?>	
								<!--A chaque boucle qui fini un cycle de 4 on ferme une div pour la ligne-->
									<div class="clearfix"></div>
								</div>
							<?php
						}
					?>

			<?php
				$cmtp ++;
				endforeach;
				endif;
			 ?>
		 </div>
	 </div>
</div>	
<?php
//ajout du footer
get_footer();