<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="robots" content="noindex,follow" />
    <title>La CiTé, Ecole vivante à Liège</title>
    <link href="<?php echo get_stylesheet_directory_uri()?>/style.css" rel="stylesheet">
</head>
<body>
<header class="header">
    <h1 class="hidden">La CiTé, Ecole vivante à Liège</h1>
    <nav class="nav-menu">
        <h2 class="hidden nav-menu__title">Que cherchez vous ?</h2>
        <a href="./accueil" id="logo" class="nav-menu__link">
            <img src="<?php echo get_stylesheet_directory_uri()?>/assets/logo.png" alt="Logo de la CiTé" width="248" height="103">
        </a>
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
</header>