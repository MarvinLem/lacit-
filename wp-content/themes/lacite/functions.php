<?php

//ajouter une nouvelle zone de menu à mon thème
function register_my_menus() {
    register_nav_menus(array(
        'header-menu' => __( 'Menu Header' ),
        'footer-menu' => __( 'Menu Footer' ),
    ));
}

function wpm_custom_post_type()
{

    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labels = array(
        // Le nom au pluriel
        'name' => _x('Informations', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name' => _x('Information', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name' => __('Informations'),
        // Les différents libellés de l'administration
        'all_items' => __('Toutes les informations'),
        'view_item' => __('Voir les informations'),
        'add_new_item' => __('Ajouter une nouvelle information'),
        'add_new' => __('Ajouter'),
        'edit_item' => __("Editer l'information"),
        'update_item' => __("Modifier l'information"),
        'search_items' => __('Rechercher une information'),
        'not_found' => __('Non trouvée'),
        'not_found_in_trash' => __('Non trouvée dans la corbeille'),
    );

    // On peut définir ici d'autres options pour notre custom post type

    $args = array(
        'label' => __('Informations'),
        'description' => __('Toutes les informations'),
        'labels' => $labels,
        // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
        'supports' => array('title', 'editor'),
        /*
        * Différentes options supplémentaires
        */
        'hierarchical' => false,
        'public' => true,
        'menu_icon' => __('dashicons-welcome-add-page'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'informations'),

    );

    // On enregistre notre custom post type qu'on nomme ici "informations" et ses arguments
    register_post_type('informations', $args);
}

function wpm_custom_post_type_faq()
{

    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labels = array(
        // Le nom au pluriel
        'name' => _x('Questions fréquentes', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name' => _x('Question fréquente', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name' => __('Questions fréquentes'),
        // Les différents libellés de l'administration
        'all_items' => __('Toutes les questions fréquentes'),
        'view_item' => __('Voir les questions fréquentes'),
        'add_new_item' => __('Ajouter une nouvelle question fréquente'),
        'add_new' => __('Ajouter'),
        'edit_item' => __("Editer la question fréquente"),
        'update_item' => __("Modifier la question fréquente"),
        'search_items' => __('Rechercher une question fréquente'),
        'not_found' => __('Non trouvée'),
        'not_found_in_trash' => __('Non trouvée dans la corbeille'),
    );

    // On peut définir ici d'autres options pour notre custom post type

    $args = array(
        'label' => __('Questions Fréquentes'),
        'description' => __('Toutes les questions fréquentes'),
        'labels' => $labels,
        // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
        'supports' => array('title', 'editor'),
        /*
        * Différentes options supplémentaires
        */
        'hierarchical' => false,
        'public' => true,
        'menu_icon' => __('dashicons-edit'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'faq'),

    );

    // On enregistre notre custom post type qu'on nomme ici "faq" et ses arguments
    register_post_type('faq', $args);
}

function wpm_custom_post_type_contact()
{

    // On rentre les différentes dénominations de notre custom post type qui seront affichées dans l'administration
    $labels = array(
        // Le nom au pluriel
        'name' => _x('Informations de contact', 'Post Type General Name'),
        // Le nom au singulier
        'singular_name' => _x('Information de contact', 'Post Type Singular Name'),
        // Le libellé affiché dans le menu
        'menu_name' => __('Informations de contact'),
        // Les différents libellés de l'administration
        'all_items' => __('Toutes les informations de contact'),
        'view_item' => __('Voir les informations de contact'),
        'add_new_item' => __('Ajouter une nouvelle information de contact'),
        'add_new' => __('Ajouter'),
        'edit_item' => __("Editer l'information de contact"),
        'update_item' => __("Modifier l'information de contact"),
        'search_items' => __('Rechercher une information de contact'),
        'not_found' => __('Non trouvée'),
        'not_found_in_trash' => __('Non trouvée dans la corbeille'),
    );

    // On peut définir ici d'autres options pour notre custom post type

    $args = array(
        'label' => __('Contact'),
        'description' => __('Toutes les informations de contact'),
        'labels' => $labels,
        // On définit les options disponibles dans l'éditeur de notre custom post type ( un titre, un auteur...)
        'supports' => array('title'),
        /*
        * Différentes options supplémentaires
        */
        'hierarchical' => false,
        'public' => true,
        'menu_icon' => __('dashicons-email-alt'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'contact'),

    );

    // On enregistre notre custom post type qu'on nomme ici "informations" et ses arguments
    register_post_type('contact', $args);
}

function create_about_taxonomy() {

// Labels part for the GUI

    $labels = array(
        'name' => _x( 'A propos de', 'taxonomy general name' ),
        'singular_name' => _x( 'A propos', 'taxonomy singular name' ),
        'popular_items' => __( 'A propos populaires' ),
        'all_items' => __( 'Toutes les technologies' ),
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => __( 'Modifier un a propos' ),
        'update_item' => __( 'Mettre a jour un a propos' ),
        'add_new_item' => __( 'Ajouter une nouveau a propos' ),
        'choose_from_most_used' => __( 'Choisir parmi les plus populaires' ),
        'menu_name' => __( 'A propos de' ),
    );

// Now register the non-hierarchical taxonomy like tag

    register_taxonomy('about','informations',array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => true,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array( 'slug' => 'about' ),
    ));
}

add_image_size('image_size', 2000,1500, false);
add_image_size('image_size/2', 1000,750, false);
add_image_size('image_size/3', 600,450, false);
add_image_size('image_size/4', 300,225, false);

//use wp_get_attachment_image

add_action( 'init', 'wpm_custom_post_type', 0 );
add_action( 'init', 'wpm_custom_post_type_faq', 0 );
add_action( 'init', 'wpm_custom_post_type_contact', 0 );
add_action( 'init', 'create_about_taxonomy', 0 );
add_action( 'init', 'register_my_menus', 0 );