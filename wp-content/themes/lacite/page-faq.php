<?php get_header() ?>
<?php

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$explodedURL = explode('/',$actual_link);

$query = new WP_Query( array( 'post_type' => 'faq', 'title' => $explodedURL[5]));

?>

<main>
    <section class="idees">
        <h2 class="hidden">Les idées reçues</h2>
        <?php if ( $query->have_posts() ) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <div>
                    <p class="number"><?php echo $query->current_post + 1?></p>
                    <h3><?php the_title(); ?></h3>
                    <p><?php the_content(); ?></p>
                </div>
            <?php endwhile; ?>
        <?php endif; ?>
        <a href="./comment-ca-marche">Votre question n'apparait pas dans cette liste ?</a>
    </section>
</main>
<?php get_footer() ?>