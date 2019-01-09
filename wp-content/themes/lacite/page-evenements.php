<?php get_header() ?>
<?php

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$explodedURL = explode('/',$actual_link);

$query = new WP_Query( array( 'post_type' => 'post', 'title' => $explodedURL[5], 'posts_per_page' => 4, 'offset' => 1));
$query2 = new WP_Query( array( 'post_type' => 'post', 'title' => $explodedURL[5], 'posts_per_page' => 1));

?>
<main>
    <section class="main-article">
    <?php if ( $query->have_posts() ) : ?>
        <?php while ( $query2->have_posts() ) : $query2->the_post(); ?>
        <?php $image = get_field('image');?>
        <img src="<?php echo $image['url']?>" alt="Photo d'étudiants contents" width="663" height="428">
        <div>
            <h2><?php the_title()?></h2>
            <p class="small">le 27 septembre 2018</p>
            <p><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 300, '...');?></p>
            <a href="<?php the_permalink(); ?>">En savoir plus</a>
        </div>
    </section>
        <?php endwhile; ?>
    <?php endif; ?>
    <section class="secondary-article">
        <h2 class="hidden">Articles récents</h2>
        <?php if ( $query->have_posts()) : ?>
            <?php while ( $query->have_posts() ) : $query->the_post(); ?>
                <?php $image = get_field('image');?>
        <div class="article">
            <img src="<?php echo $image['url']?>" alt="Photo d'étudiants contents" width="388" height="250">
            <div>
                <h3><?php the_title()?></h3>
                <p class="small">Le 3 octobre 2018</p>
                <p><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 100, '...');?></p>
                <a href="<?php the_permalink(); ?>">En savoir plus</a>
            </div>
        </div>
            <?php endwhile; ?>
        <?php endif; ?>
    </section>
</main>
<?php get_footer() ?>