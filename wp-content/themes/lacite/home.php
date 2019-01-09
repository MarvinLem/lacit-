<?php get_header()?>
<?php

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$explodedURL = explode('/',$actual_link);

$query = new WP_Query( array( 'post_type' => 'post', 'title' => $explodedURL[4], 'posts_per_page' => 3));
?>
    <main class="main">
        <section class="news">
            <h2 class="hidden">Les derniers articles</h2>
            <?php if ( $query->have_posts() ) : ?>
                <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                    <?php $image = get_field('image');?>
            <article>
                        <div>
                            <h3 class="article__title"><?php the_title()?></h3>
                            <p class="article__text"><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 400, '...');?></p>
                            <a href="<?php the_permalink(); ?>" class="article__link">En savoir plus</a>
                        </div>
                        <img src="<?php echo $image['url']?>" alt="Photo d'étudiants heureux" class="article__image" width="663" height="428">
            </article>
                <?php endwhile; ?>
            <?php endif; ?>
        </section>
        <div class="metro">
            <img src="<?php echo get_template_directory_uri()?>/assets/design_metro.svg">
        </div>
        <section class="presentation">
            <img src="<?php echo get_stylesheet_directory_uri()?>/assets/ecoliers.jpg" alt="Photo d'étudiants heureux" width="665" height="443">
            <div class="text">
                <h2>Pourquoi choisir notre école ?</h2>
                <p>La CiTé – école vivante est un projet collaboratif de création d’une école secondaire différente. Il est porté par des enseignants chevronnés, désireux de soutenir le bien-être et l’exigence dans l’éducation des adolescents d’aujourd’hui, adultes de demain ; déjà citoyens.</p>
                <a href="./comment-ca-marche">Notre école, c'est quoi ?</a>
            </div>
        </section>
    </main>
<?php get_footer(); ?>