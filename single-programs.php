<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Programs </title>
</head>

<body>
    <?php get_header();
    while (have_posts()) {
        the_post();
        pageBanner(); ?>
        <div class="container container--narrow page-section">
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href=" <?php echo get_post_type_archive_link('programs'); ?>">
                        <i class="fa fa-home" aria-hidden="true"></i> All Programs </a>
                    <span class="metabox__main"> <?php the_title(); ?> </span>
                </p>

            </div>



            <div class="generic-content">
                <?php the_content() ?>
            </div>
            <?php
            //$today = date('Ymd');
            $relatedProfessors = new WP_Query(array(
                'posts_per_page' => -1,
                'post_type' => 'professors',
                //'meta_key' => 'event_date',           // sort by date 
                'orderby' => 'title',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'related_programs',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                    )

                )

            ));
            if ($relatedProfessors->have_posts()) {
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium"> ' . get_the_title() . ' Professors </h2>';
                echo ' <ul class="professor-cards">';
                while ($relatedProfessors->have_posts()) {
                    $relatedProfessors->the_post(); ?>

                    <li class="professor-card__list-item">
                        <a class="professor-card" href="<?php the_permalink(); ?>">
                            <img src="<?php the_post_thumbnail_url('professorLandscape');  ?> " alt="" class="professor-card__image">
                            <span class="professor-card__name"> <?php the_title(); ?> </span>
                        </a>
                    </li>

            <?php
                }
                echo ' </ul> ';
            }
            wp_reset_postdata();

            $today = date('Ymd');
            $homePageEvents = new WP_Query(array(
                'posts_per_page' => 2,
                'post_type' => 'events',
                'meta_key' => 'event_date',           // sort by date 
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'meta_query' => array(
                    array(
                        'key' => 'event_date',
                        'compare' => '>=',
                        'value' => $today,
                        'type' => 'numeric'
                    ),
                    array(
                        'key' => 'related_programs',
                        'compare' => 'LIKE',
                        'value' => '"' . get_the_ID() . '"'
                    )

                )

            ));
            if ($homePageEvents->have_posts()) {
                echo '<hr class="section-break">';
                echo '<h2 class="headline headline--medium"> Up Coming    ' . get_the_title() . '   Events </h2>';
                while ($homePageEvents->have_posts()) {
                    $homePageEvents->the_post();
                    get_template_part('template-files/content-event');
                }
            }
            ?>







        </div>














    <?php }




    get_footer();

    ?>
</body>

</html>