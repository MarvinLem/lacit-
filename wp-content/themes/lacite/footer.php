<?php

$queryContact = new WP_Query( array( 'post_type' => 'contact'));

?>
<footer>
    <div>
        <h2>Ou sommes nous ?</h2>
        <?php if ( $queryContact->have_posts() ) : ?>
            <?php while ( $queryContact->have_posts() ) : $queryContact->the_post(); ?>
                <ul>
                    <li><?php echo get_field('street');?></li>
                    <li><?php echo get_field('town');?></li>
                </ul>
            <?php endwhile; ?>
        <?php endif; ?>
        <h3>Merci à ceux qui nous soutiennent</h3>
        <img src="<?php echo get_stylesheet_directory_uri()?>/assets/fwb.png" alt="Logo de la fédération wallonie-bruxelles" width="248" height="236">
    </div>
    <div>
        <h2>Comment nous contactez ?</h2>
        <?php if ( $queryContact->have_posts() ) : ?>
            <?php while ( $queryContact->have_posts() ) : $queryContact->the_post(); ?>
                <ul>
                    <li><?php echo get_field('email'); ?></li>
                    <li><?php echo get_field('numero'); ?></li>
                    <li><a href="./contact" class="contact">Nous contacter ici !</a></li>
                </ul>
                <h3>Restez en contact avec nous !</h3>
                <a href="<?php echo get_field('facebook');?>"><img src="<?php echo get_stylesheet_directory_uri()?>/assets/facebook-logo-button.svg" alt="Icone Facebook"></a>
            <?php endwhile; ?>
        <?php endif; ?>
    </div>
    <div>
        <nav>
            <h2 class="hidden">Que recherchez vous ?</h2>
            <?php
            $menuParameters = array (
                'theme_location' => 'header-menu' ,
                'menu_class' => 'nav-menu',
                'container' => 'nav',
                'echo' => false,
                'item_wrap' => '%3s'
            );
            echo strip_tags(wp_nav_menu( $menuParameters ), '<a>' );
            ?>
        </nav>
    </div>
</footer>
</body>
</html>