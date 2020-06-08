<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog posts</title>
</head>

<body>
    <?php get_header();
    while (have_posts()) {
        the_post();
        pageBanner(); ?>
        <div class="container container--narrow page-section">
            <div class="metabox metabox--position-up metabox--with-home-link">
                <p><a class="metabox__blog-home-link" href=" <?php echo site_url('/blog') ?> "><i class="fa fa-home" aria-hidden="true"></i> Blog Home </a> <span class="metabox__main"> Post Auther <?php the_author_posts_link(); ?> Date : <?php the_time('y /j / n') ?> in
                        <?php echo get_the_category_list(',');  ?> </span></p>
            </div>



            <div class="generic-content">
                <?php the_content() ?>
            </div>








        </div>














    <?php }




    get_footer();

    ?>
</body>

</html>