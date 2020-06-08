<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Professors </title>
</head>

<body>
    <?php get_header();
    while (have_posts()) {
        the_post();
        pageBanner(); ?>

        <div class="container container--narrow page-section">
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p>
                    <a class="metabox__blog-home-link" href=" <?php echo get_post_type_archive_link('events'); ?>">
                        <i class="fa fa-home" aria-hidden="true"></i> Events Home </a>
                    <span class="metabox__main"> <?php the_title(); ?> </span>
                </p>

            </div>
            <div class="generic-content">
                <div class="row group">
                    <div class="one-third">
                        <?php the_post_thumbnail('professorPortrait');  ?>
                    </div>
                    <div class="two-thirds">
                        <?php the_content() ?>
                    </div>
                </div>
            </div>
            <?php
            $relatedPrograms = get_field('related_programs', false, false);
            if ($relatedPrograms) {
                echo '<hr class="section-break">';
                echo '<h1 class="headline headline--medium>Subjects Taught"</h1>';
                echo '<ul class="link-list min-list >"';
                foreach ($relatedPrograms as $programs) { ?>
                    <li>
                        <a href="<?php echo get_the_permalink($programs); ?>"> <?php echo get_the_title($programs); ?> </a>
                    </li>

            <?php  }
                echo "</ul>";
            }
            ?>
        </div>

    <?php }
    get_footer();
    ?>
</body>

</html>