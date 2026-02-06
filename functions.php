<?php
/*

*/

function marsriva_scripts() {

    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . "/assets/npublic/libs/css/bootstrap.css", array(), 1 );
    wp_enqueue_style( 'site',      get_template_directory_uri() . "/assets/css/site.css",                   array(), 1 );
    wp_enqueue_style( 'home',      get_template_directory_uri() . "/assets/css/home.css",                   array(), 1 );
    wp_enqueue_style( 'nav',       get_template_directory_uri() . "/assets/upload/css/nav.css",             array(), 1 );
    wp_enqueue_style( 'a542',      get_template_directory_uri() . "/assets/upload/css/a542852518db4913ba26b2cb5f622c2a.css", array(), 1 );
    wp_enqueue_style( 'abe5',      get_template_directory_uri() . "/assets/upload/css/abe57529cab54a19b6da0041db3fb122.css", array(), 1 );
    wp_enqueue_style( '6f72',      get_template_directory_uri() . "/assets/upload/css/6f7215910b184bd6873d42388538e76c.css", array(), 1 );
    wp_enqueue_style( 'sidebar',   get_template_directory_uri() . "/assets/upload/css/sidebar.css", array(), 1 );
    wp_enqueue_style( 'products',  get_template_directory_uri() . "/assets/css/products.css",           array(), 1 );
    wp_enqueue_style( 'product-details',  get_template_directory_uri() . "/assets/css/product-details.css",           array(), 1 );
    wp_enqueue_style( 'contact',  get_template_directory_uri() . "/assets/css/contact.css",           array(), 1 );

    wp_enqueue_script( 'nav-js', get_template_directory_uri() . "/assets/upload/js/nav.js", array('jquery'), 1, true  ); 
    wp_enqueue_script( '9369',   get_template_directory_uri() . "/assets/upload/js/9369ea15214844fba0610aee5ce2161e.js", array(), 1, true  ); 
    wp_enqueue_script( '56d1',   get_template_directory_uri() . "/assets/upload/js/56d1dc9e74114aa0a152b07725ffc960.js", array(),   1, true  ); 
    wp_enqueue_script( '3b40',   get_template_directory_uri() . "/assets/upload/js/3b40c5321d4a424a8951ae1ecddfaac5.js@instance=new2025012411115482474&viewType=p&v=1764922889000&siteType=oper.js", array(),   1, true  ); 
    wp_enqueue_script( 'ac3d',   get_template_directory_uri() . "/assets/upload/js/ac3d.js", array(),   1, true  ); 
    wp_enqueue_script( 'sidebar',   get_template_directory_uri() . "/assets/upload/js/sidebar.js", array(),   1, true  ); 
    wp_enqueue_script( 'search',   get_template_directory_uri() . "/assets/upload/js/search.js", array(),   1, true  ); 
    wp_enqueue_script( 'common', get_template_directory_uri() . "/assets/npublic/commonjs/common.js", array('jquery'), 1, true ); 
    wp_enqueue_script( 'bundle',  get_template_directory_uri() . "/assets/npublic/libs/core/bundle.js", array(), 1, false ); 
    wp_enqueue_script( 'product-detail',  get_template_directory_uri() . "/assets/upload/js/product-detail.js", array(), 1, true ); 
    wp_enqueue_script( 'magnifier',  get_template_directory_uri() . "/assets/upload/js/magnifier.js", array(), 1, true ); 
    wp_enqueue_script( 'product-tab',  get_template_directory_uri() . "/assets/upload/js/product-tab.js", array(), 1, true ); 
    wp_enqueue_script( 'cmsAjax',  get_template_directory_uri() . "/assets/npublic/libs/widget/cmsAjax.js", array(), 1, true ); 

}

add_action( 'wp_enqueue_scripts', 'marsriva_scripts' );