<?php
get_header();
?>

<div class="project-sec">
	<div class="container">
		<div class="cntnt-head">
			<h2><?php the_field('404_titre', 'option') ?></h2>
		</div>
		<div class="text-center">
			<img class="example-image" src="<?php the_field('404_gif_1', 'option') ?>" width="35%" alt="gif troll erreur 404">
		</div>
		<div class="cntnt-head content text-center">
			<h3><?php the_field('404_message', 'option') ?></h3>
			<img class="example-image" src="<?php the_field('404_gif_2', 'option') ?>" width="25%" alt="2eme gif troll erreur 404"/>
		</div>
	</div>
</div>

<?php
get_footer(); //equivalent include (footer);
?>