<!DOCTYPE html>
<html lang="en">
<!--Blog Page   How to make Blog Page In Wordpress
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Search </title>
</head>

<body>
    <?php
    get_header();
    pageBanner(array(
        'title' => ' Search Results!',
        'subtitle' => ' You searched for &ldquo;' . get_search_query() . '&rdquo;'
    )) ?>
    <div class="container container--narrow page-section">
        <?php
        while (have_posts()) {
            the_post();
            get_template_part('template-files/content', get_post_type()); ?>


        <?php   }
        echo paginate_links();

        ?>










    </div>


    <?php
    get_footer();
    ?>
</body>

</html>