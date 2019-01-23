<?php get_header(); ?>
<?php

$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$explodedURL = explode('/',$actual_link);

$queryEcole = new WP_Query( array( 'post_type' => 'informations', 'title' => $explodedURL[5], 'meta_query' => array(
    array(
        'key' => 'theme',
        'value' => 'Ecole'
    )
)));

$queryEleves = new WP_Query( array( 'post_type' => 'informations', 'title' => $explodedURL[5], 'meta_query' => array(
    array(
        'key' => 'theme',
        'value' => 'Eleve'
    )
)));

$queryProfesseurs = new WP_Query( array( 'post_type' => 'informations', 'title' => $explodedURL[5], 'meta_query' => array(
    array(
        'key' => 'theme',
        'value' => 'Professeurs'
    )
)));

$queryCours = new WP_Query( array( 'post_type' => 'informations', 'title' => $explodedURL[5], 'meta_query' => array(
    array(
        'key' => 'theme',
        'value' => 'Cours'
    )
)));

?>
<main>
    <section class="description">
        <h2>C'est quoi la CiTé ?</h2>
        <img src="<?php echo get_stylesheet_directory_uri()?>/assets/batiment.jpg" alt="Photos d'école" width="665">
        <p>La CiTé – école vivante est un projet collaboratif de création d’un établissement secondaire différent. Il est porté par des enseignants chevronnés, désireux de soutenir le bien-être et l’exigence dans l’éducation des adolescents d’aujourd’hui, adultes de demain ; déjà citoyens.
        </p>
        <p>La CiTé – école vivante, s’inspire notamment du fonctionnement organisationnel et pédagogique du Collège-Lycée Expérimental (CLE) d'Hérouville-Saint-Clair (Académie de Caen) en Normandie, inauguré en 1982. Comme cet établissement, La CiTé – école vivante ne se revendique d’aucun courant pédagogique, mais il fonde son action sur une principe simple : « Tout est éducatif ».
        </p>
        <p>Chaque élève y est considéré comme une personne, chaque adulte contribue à l’éducation et chaque dispositif soutient une intention.
        </p>
    </section>
    <section class="navigation">
        <h2>Comment notre école marche ?</h2>
        <div class="grid">
            <div class="categorie">
                <img src="<?php echo get_stylesheet_directory_uri()?>/assets/diplome.svg">
                <a href="#eleve">Comment l'élève vit ?</a>
            </div>
            <div class="categorie">
                <img src="<?php echo get_stylesheet_directory_uri()?>/assets/old-school.svg">
                <a href="#ecole">Comment est-ce-que le système fonctionne ?</a>
            </div>
            <div class="categorie">
                <img src="<?php echo get_stylesheet_directory_uri()?>/assets/course.svg">
                <a href="#cours">Comment sont les cours ?</a>
            </div>
            <div class="categorie">
                <img src="<?php echo get_stylesheet_directory_uri()?>/assets/classroom.svg">
                <a href="#professeurs">Comment travaillent les professeurs ?</a>
            </div>
        </div>
    </section>
    <section class="informations">
        <h2>Informations</h2>
        <div id="eleve">
            <h3>Comment l'élève vit ?</h3>
            <ul>
            <?php if ( $queryEleves->have_posts() ) : ?>
                <?php while ( $queryEleves->have_posts() ) : $queryEleves->the_post(); ?>
                <li><a href="<?php the_permalink(); ?>"><?php the_title()?></a></li>
                <?php endwhile; ?>
            <?php endif; ?>
            </ul>
        </div>
        <div id="ecole">
            <h3>Comment est-ce-que le système fonctionne ?</h3>
            <ul>
                <?php if ( $queryEcole->have_posts() ) : ?>
                    <?php while ( $queryEcole->have_posts() ) : $queryEcole->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title()?></a></li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div id="cours">
            <h3>Comment sont les cours ?</h3>
            <ul>
                <?php if ( $queryCours->have_posts() ) : ?>
                    <?php while ( $queryCours->have_posts() ) : $queryCours->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title()?></a></li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
        <div id="professeurs">
            <h3>Comment travaillent les professeurs ?</h3>
            <ul>
                <?php if ( $queryProfesseurs->have_posts() ) : ?>
                    <?php while ( $queryProfesseurs->have_posts() ) : $queryProfesseurs->the_post(); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title()?></a></li>
                    <?php endwhile; ?>
                <?php endif; ?>
            </ul>
        </div>
    </section>
</main>
<?php get_footer(); ?>