<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <?php
    get_header();
    pageBanner(array(
        'title' => ' Check Past Events !',
        'subtitle' => ' look our past events'
    )) ?>

    <div class="container container--narrow page-section">
        <?php
        $today = date('Ymd');
        $pastEvents = new WP_Query(array(
            'paged' => get_query_var('paged', 1),
            //'post_per_page' => 1,
            'post_type' => 'events',
            'meta_key' => 'event_date',           // sort by date 
            'orderby' => 'meta_value_num',
            'order' => 'ASC',
            'meta_query' => array(
                array(
                    'key' => 'event_date',
                    'compare' => '<',
                    'value' => $today,
                    'type' => 'numeric'
                )

            )

        ));


        while ($pastEvents->have_posts()) {
            $pastEvents->the_post();
            get_template_part('template-files/content-event');
        }
        echo paginate_links(array(
            'total' => $pastEvents->max_num_pages(),
        ));

        ?>
    </div>


    <?php
    get_footer();
    ?>

</body>

</html>