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

	<?php require('nav.php'); ?>