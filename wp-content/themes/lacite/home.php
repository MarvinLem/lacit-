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
            <article class="article">
                <div class="title">
                    <h3 class="article__title"><?php the_title()?></h3>
                </div>
                <div class="content">
                    <p class="article__text"><?php $content = get_the_content(); echo mb_strimwidth($content, 0, 400, '...');?></p>
                    <a href="<?php the_permalink(); ?>" class="article__link">En savoir plus</a>
                </div>
                <div class="image">
                    <img src="<?php echo $image['url']?>" alt="<?php echo $image['alt']?>" class="article__image">
                </div>
            </article>
                <?php endwhile; ?>
            <?php endif; ?>
            <div class="slider">
                <img src="<?php echo get_stylesheet_directory_uri()?>/assets/left-arrow.svg">
                <img src="<?php echo get_stylesheet_directory_uri()?>/assets/circle-shape-outline.svg">
                <img src="<?php echo get_stylesheet_directory_uri()?>/assets/circle-shape-outline.svg">
                <img src="<?php echo get_stylesheet_directory_uri()?>/assets/circle-shape-outline.svg">
                <img src="<?php echo get_stylesheet_directory_uri()?>/assets/right-arrow.svg">
            </div>
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
    <script>
        const articleArray = document.querySelectorAll('.article');
        let activeArticle = articleArray[0];
        const imgArray = document.querySelectorAll('div.slider img');
        let activeImg = imgArray[1];
        const leftArrow = imgArray[0];
        const rightArrow = imgArray[4];

        function displayArticle(){
            articleArray.forEach((article) => {
                article.style.display = "none";
            });
            imgArray.forEach((image) => {
                image.style.width = "25px";
                image.style.height = "25px";
            });
            activeArticle.style.display = "block";
            activeImg.style.width = "30px";
            activeImg.style.height = "30px";
        }
        
        function leftArticle(){
            if(activeArticle === articleArray[1]){
                activeArticle = articleArray[0]
            } else if(activeArticle === articleArray[2]){
                activeArticle = articleArray[1]
            }

            if(activeImg === imgArray[2]){
                activeImg = imgArray[1]
            } else if(activeImg === imgArray[3]){
                activeImg = imgArray[2]
            }

            displayArticle();
        }

        function rightArticle(){
            if(activeArticle === articleArray[0]){
                activeArticle = articleArray[1]
            } else if(activeArticle === articleArray[1]){
                activeArticle = articleArray[2]
            }

            if(activeImg === imgArray[1]){
                activeImg = imgArray[2]
            } else if(activeImg === imgArray[2]){
                activeImg = imgArray[3]
            }

            displayArticle();
        }

        displayArticle(event);
        leftArrow.addEventListener("click",leftArticle);
        rightArrow.addEventListener("click",rightArticle);
    </script>
<?php get_footer(); ?>