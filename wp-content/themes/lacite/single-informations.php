<?php get_header(); ?>
<?php

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$explodedURL = explode('/',$actual_link);

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$postid = url_to_postid( $url );
$post = get_post($postid);
$terms = get_the_terms($post->ID, 'about');

$query = new WP_Query( array( 'post_type' => 'informations', 'title' => $explodedURL[6], 'post__not_in' => array($postid)));

?>
<main>
    <div class="arianne">
        <p><a href="./accueil">Accueil</a></p>
        <p><a href="./comment-ca-marche">Comment notre école marche ?</a></p>
        <p><a href="./comment-ca-marche"><?php foreach($terms as $term){echo $term->name;}?></a></p>
        <p><a href="#"><?php echo $post -> post_title?></a></p>
    </div>
    <section class="question">
        <h2><?php echo $post -> post_title?></h2>
        <img src="<?php echo get_template_directory_uri()?>/assets/ecole.jpg" alt="Photos d'école" width="665">
        <p><?php echo $post -> post_content ?></p>
    </section>
    <section class="interest">
        <div>
            <h2>Cela pourrait vous intéresser</h2>
            <ul>
                <?php if ( $query->have_posts() ) : ?>
                    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </section>
</main>
<?php get_footer(); ?>