<?php
add_theme_support( 'post-thumbnails', array( 'projects' ) ); // adds thumbnail support for the Projects CPT


function setup_projects_cpt(){
    $labels = array(
        'name' => _x('Projects', 'post type general name'),
        'singular_name' => _x('Project', 'post type singular name'),
        'add_new' => _x('Add New', 'Project'),
        'add_new_item' => __('Add New Project'),
        'edit_item' => __('Edit Project'),
        'new_item' => __('New Project'),
        'all_items' => __('All Projects'),
        'view_item' => __('View Project'),
        'search_items' => __('Search Projects'),
        'not_found' => __('No Projects Found'),
        'not_found_in_trash' => __('No Projects found in the trash'),
        'parent_item_colon' => '',
        'menu_name' => 'Projects'
        );
    $args = array(
        'labels' => $labels,
        'description' => 'My Projects',
        'rewrite' => array('slug' => 'projects'),
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
        'has_archive' => true,
        'taxonomies' => array(''),
        'menu_icon' => 'dashicons-admin-multisite', //Find the appropriate dashicon here: https://developer.wordpress.org/resource/dashicons/
        );
    register_post_type('projects', $args);
}
add_action('init', 'setup_projects_cpt');
 
//The following snippet is used to enable categories for the projects CPT. 
function projects_taxonomy() {  
    register_taxonomy(  
        'project_categories',  //The name of the taxonomy. Name should be in slug form (no spaces and all lowercase. no caps). 
        'projects',        //post type name
        array(  
            'hierarchical' => true,  
            'label' => 'Project Categories',  //Label Displayed in the Admin when creating a new project
            'query_var' => true,
            'rewrite' => array(
                'slug' => 'projects', // This controls the base slug that will display before each term
                'with_front' => false // Don't display the category base before 
            )
        )  
    );  
}  
add_action( 'init', 'projects_taxonomy');


?>