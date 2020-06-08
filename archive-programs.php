<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programs</title>
</head>

<body>


    <?php
    get_header();
    pageBanner(array(
        'title' => 'All Programs',
        'subtitle' => 'Programs are Cool !'
    )) ?>
    <div class="container container--narrow page-section">
        <ul class="link-list min-list">
            <?php
            while (have_posts()) {
                the_post();   ?>
                <li> <a href=" <?php the_permalink(); ?>"> <?php the_title(); ?></a> </li>


            <?php   }
            echo paginate_links();

            ?>

        </ul>




    </div>


    <?php

    get_footer();
    ?>

</body>

</html>