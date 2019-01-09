<?php get_header(); ?>
<?php

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$explodedURL = explode('/',$actual_link);

$postid = url_to_postid( $url );
$post = get_post($postid);
$imageMain = get_field('image');
$date = get_field('date');

$query = new WP_Query( array( 'post_type' => 'post', 'title' => $explodedURL[5], 'post__not_in' => array($postid)));

?>
<main>
    <section class="main-article">
            <img src="<?php echo $imageMain['url']?>" alt="Photo d'étudiants contents" width="663" height="428">
            <div>
                <h2><?php echo $post -> post_title ?></h2>
                <p><small><?php echo $date ?></small></p>
                <p><?php echo $post -> post_content ?></p>
            </div>
    </section>
    <section class="articles">
        <h2>Articles Récents</h2>
<?php if ( $query->have_posts() ) : ?>
    <?php while ( $query->have_posts() ) : $query->the_post(); ?>
        <?php $image = get_field('image');?>
        <div>
            <h3><?php the_title(); ?></h3>
            <img src="<?php echo $image['url']?>" alt="Photo d'étudiants contents" width="388" height="250">
            <p><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 200, '...');?></p>
        </div>
    <?php endwhile; ?>
<?php endif; ?>
    </section>
</main>
<?php get_footer();?>