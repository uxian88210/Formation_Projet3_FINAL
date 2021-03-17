<div class="header-top">
	 <div class="container">
		 <div class="logo">			
				 <h1><a href="<?php echo home_url(); ?>"><?php echo strtoupper(get_field('nom', 'options')) ?></a></h1>			
		 </div>
		 <div class="details">				 
				<div class="locate">
					 <div class="detail-grid">
						 <div class="lctr">
						 		<?php 
						 			$icone_localisation = get_field('icone_localisation', 'options');
						 		 ?>
								<img src="<?php echo $icone_localisation['url']?>" alt="icone localisation"/>
						 </div>
						 <p><?php the_field('adresse', 'options') ?>,
						 <span><?php the_field('ville', 'options') ?></span></p>
						 <div class="clearfix"></div>
					 </div>
					 <div class="detail-grid">
					 	<?php 
					 		//mise en forme du numero de téléphone
							$telephone = get_field('telephone', 'options');
							$telephoneSubZero = substr($telephone, 1, -1);
							$telephoneFinal = str_replace(' ', '', $telephoneSubZero);
						?>
						 <div class="lctr">
						 		<?php 
						 			$icone_telephone = get_field('icone_telephone', 'options');
						 		 ?>
								<img src="<?php echo $icone_telephone['url']?>" alt="icone téléphone"/>
						 </div>
						 <p>
						 	<a href="tel:+33<?php echo $telephoneFinal ?>">Tel: <?php the_field('telephone', 'options') ?></a></p>
						 <div class="clearfix"></div>
					 </div>
				</div>
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>

<div class="header">
	 <div class="container">
		 <div class="top-menu">
		 	<?php 
		 		$img_menu_burger = get_template_directory_uri(). '/images/menu.png';
		 	 ?>
			 <span class="menu"><img src="<?php echo $img_menu_burger ?>" alt="icone menu burger"></span>
			 <?php
				wp_nav_menu( array (
					'theme_location' => "header",
					'menu_class' => 'nav1',
					'container' => "",
					'container_class' => "",
					'menu_id' => "",
					'deph' => "1",
					'link_class' => "",
					'walker' => new WP_Bootstrap_Navwalker()
				));
			?>
		 </div>
		 <!-- script-for-menu -->

		 <!-- /script-for-menu -->

		 <div class="search">					
				<form id="searchForm" action="<?php echo home_url() ?>" method="get">
					 <input type="text" value="" name="s" id="s" placeholder="Search..." required>
					 <input type="submit" value="">
				</form>					
		 </div>
		 <div class="clearfix"></div>
	 </div>
</div>