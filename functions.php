<?php
function pageBanner($args = null)
{
    if (!$args['title']) {
        $args['title'] = get_the_title();
    }
    if (!$args['subtitle']) {
        $args['subtitle'] = get_field('page_banner_subtitle');
    }
    if (!$args['photo']) {
        if (get_field('page-banner_background-image')) {
            $args['photo'] = get_field('page_banner_background-image')['sizes']['pageBanner'];
        } else {
            $args['photo'] = get_theme_file_uri('/images/ocean.jpg');
        }
    }

?>


    <div class="page-banner">
        <div class="page-banner__bg-image" style="background-image:url( <?php echo $args['photo'];  ?>)">

        </div>

        <div class="page-banner__content container container--narrow">
            <h1 class="page-banner__title"> <?php echo $args['title']; ?> </h1>
            <div class="page-banner__intro">
                <p> <?php echo $args['subtitle']; ?> </p>
            </div>
        </div>


    </div>

<?php }

function university_files()
{
    //javascript
    wp_enqueue_script('main-javascript', get_theme_file_uri('/js/scripts-bundled.js'), array('jquery'), microtime(), true);
    wp_enqueue_script('secondery-javascript', get_theme_file_uri('/js/Search.js'), array('jquery'), microtime(), true);

    //csss
    wp_enqueue_style('google-fonts', '//fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,400i,700,700i|Roboto:100,300,400,400i,700,700i');
    wp_enqueue_style('font-awsome', '//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
    wp_enqueue_style('university_main_style', get_stylesheet_uri(), NULL, microtime());
}
add_action('wp_enqueue_scripts', 'university_files');



function university_features()
{
    register_nav_menu('headerMenuLocation', 'Header Menu Location');
    register_nav_menu('footerMenuLocationOne', 'Footer Menu Location One');
    register_nav_menu('footerMenuLocationTwo', 'Footer Menu Location two');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('professorLandscape', 400, 260, true);
    add_image_size('professorPortrait', 480, 660, true);
    add_image_size('pageBanner', 1500, 360, true);
}

add_action('after_setup_theme', 'university_features');
/**
 * Microtime for browser caching
 */

function university_adjustments($query)
{
    if (!is_admin() and is_post_type_archive('programs') and $query->is_main_query()) {
        $query->set('orderby', 'title');
        $query->set('order', 'ASC');
        $query->set('post_per_page', -1);
    }

    $today = date('Ymd');
    if (!is_admin() and is_post_type_archive('events') and $query->is_main_query()) {
        $today = date('Ymd');
        $query->set('meta_key', 'event_date');
        $query->set('orderby', 'meta_value_num');
        $query->set('order', 'ASC');
        $query->set('meta_query', array(
            array(
                'key' => 'event_date',
                'compare' => '>=',
                'value' => $today,
                'type' => 'numeric'
            )

        ));
    }
}
add_action('pre_get_posts', 'university_adjustments');
