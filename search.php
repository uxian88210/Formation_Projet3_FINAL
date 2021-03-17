<?php get_header();

?>

<div class="container">
    <div class="row m-2">
        <div class="col-md-12 cntnt-head">
            <h3>Résultats de la recherche :</h3>
        </div>
    </div>
</div>
<div class="container">
        <?php
        if ( have_posts() ) :
        while ( have_posts() ) : the_post();
        ?>
        <div class="row">
            <h3 class="text-center"><?php the_title() ?></h3>
            <?php the_post_thumbnail('medium', array('title' => get_the_title(), 'alt' => get_the_title(), 'class' => 'img-responsive')) ?>
            <?php the_excerpt() ?>
            <div class="text-center m-2">
                <a href="<?php the_permalink() ?>"><button class="btn btn-primary mr-xs mb-sm" type="button">En savoir plus</button></a>
            </div>
        </div>
    <hr>
    <?php endwhile; else : _e('Aucun résultat ne correspond à votre recherche','agf'); endif; ?>

</div>


<?php get_footer(); ?>