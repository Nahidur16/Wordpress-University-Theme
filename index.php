<!DOCTYPE html>
<html lang="en">
<!--Blog Page   How to make Blog Page In Wordpress
-->

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Blog </title>
</head>

<body>
    <?php
    get_header();
    pageBanner(array(
        'title' => ' Welcome to our Blog !',
        'subtitle' => 'Read all the posts please !'
    )) ?>
    <div class="container container--narrow page-section">
        <?php
        while (have_posts()) {
            the_post();   ?>

            <div class="post-item">
                <h2><a href="<?php the_permalink(); ?>"> <?php the_title(); ?> </a></h2>
                <div class="metabox">
                    <p> Post Auther <?php the_author_posts_link(); ?> Date : <?php the_time('y /j / n') ?> in
                        <?php echo get_the_category_list(',');  ?>
                    </p>
                </div>
                <div class="generic-content">

                    <?php
                    the_excerpt();
                    ?>
                    <p> <a class="btn btn--blue" href="<?php the_permalink(); ?>"> Read More &raquo; </a> </p>

                </div>
            </div>
        <?php   }
        echo paginate_links();

        ?>










    </div>


    <?php
    get_footer();
    ?>
</body>

</html>