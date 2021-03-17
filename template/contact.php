<?php
/*
  Template Name: Contact
  Description : Formulaire et données de contact
*/
//ajout du header

get_header();

?>
<!----> 
<div class="contact">
		<div class="container">
			<div class="contact-top">
				<h2><?php the_title();?></h2>
			</div>
			<div class="contact-bottom">
				 <div class="contact-text">
					<div class="col-md-3 contact-right">
						<div class="address">
							<h5><?php the_field('titre_1') ?></h5>
							<p><?php echo strtoupper(get_field('nom', 'options')) ?>
							<span><?php the_field('adresse', 'options') ?>,</span>
							<?php the_field('ville', 'options') ?>.</p>
						</div>
						<div class="address">
							<h5><?php the_field('titre_2') ?></h5>
							<p><a href="tel:+33<?php echo $telephoneFinal ?>">Tel: <?php the_field('telephone', 'options') ?></a>,
							<span>
							<?php if (get_field('fax', 'options')) {
								?>
								Fax:<?php the_field('fax', 'options') ?>
								<?php
							}?>
							</span>
							Email: <a href="mailto:<?php the_field('email', 'options') ?>"><?php the_field('email', 'options') ?></a></p>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="col-md-9 contact-left">
						<!--provoque une erreur W3C car ContactFrom7 rajoute des <p> dans le formulaire-->
						<?php the_field('formulaire_de_contact') ?>
					</div>						
					<div class="clearfix"></div>
			 </div>
				<iframe src="<?php the_field('adresse_google_maps') ?>" style="border:0"></iframe>
				
		 </div>
	 </div>
</div>	
<!----> 
<?php
//ajout du footer
get_footer();