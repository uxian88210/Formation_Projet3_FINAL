<?php
get_header();
?>
<div class="project-sec">
	<div class="container">
		<div class="cntnt-head">
			<h2><?php the_title();?></h2>
		</div>
		<div class="text-center">
			<img class="example-image width-100" src="<?php the_post_thumbnail_url() ?>" alt="<?php the_title();?>"/>
		</div>
		<div class="content">
			<?php the_content() ?>
		</div>
	</div>
</div>
<?php
get_footer(); //equivalent include (footer);
?>