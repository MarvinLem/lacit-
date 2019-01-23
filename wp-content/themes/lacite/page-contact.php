<?php get_header(); ?>
<?php
    $queryContact = new WP_Query( array( 'post_type' => 'contact'));
?>
<main>
    <section class="formulaire">
        <h2>Vous avez une question ou une demande ?</h2>
        <form method="POST" action="<?php echo get_stylesheet_directory_uri()?>/form.php">
            <label for="email">Votre email</label>
            <input type="text" id="email" name="email">
            <label for="name">Votre nom</label>
            <input type="text" id="name" name="nom">
            <label for="request">Votre requète</label>
            <input type="text" id="request" name="request">
            <label for="message">Votre message</label>
            <textarea id="message" name="message"></textarea>
            <input type="submit" name="envoi" value="Envoyer">
        </form>
    </section>
    <aside class="contact">
        <h3>Informations de contact</h3>
        <p>
            Vous pouvez aussi nous contacter avec
        </p>
        <?php if ( $queryContact->have_posts() ) : ?>
            <?php while ( $queryContact->have_posts() ) : $queryContact->the_post(); ?>
                <ul>
                    <li>Notre adresse email:</li>
                    <li class="light">-<?php echo get_field('email'); ?></li>
                    <li>Notre numéro de téléphone:</li>
                    <li class="light">-<?php echo get_field('numero'); ?></li>
                </ul>
            <?php endwhile; ?>
        <?php endif; ?>
    </aside>
</main>
<?php get_footer(); ?>