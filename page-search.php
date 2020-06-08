<?php get_header();
while (have_posts()) {
    the_post();
    pageBanner(array(
        //'title' => 'll',
        //'subtitle' => 'll'
        'photo' => 'https://images.unsplash.com/photo-1525706732602-52592370085e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1050&q=80'
    )); ?>


    <div class="container container--narrow page-section">

        <?php
        $parent =  wp_get_post_parent_id(get_the_ID());
        if ($parent) { ?>

            <div class="metabox metabox--position-up metabox--with-home-link">
                <p><a class="metabox__blog-home-link" href=" <?php echo get_permalink($parent) ?> "><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($parent) ?> </a> <span class="metabox__main"> <?php the_title() ?> </span></p>
            </div>


        <?php



        }
        ?>


        <?php
        $testArray = get_pages(array(
            'child_of' => get_the_ID()
        ));

        if ($parent or $testArray) { ?>

            <div class="page-links">
                <h2 class="page-links__title"><a href=" <?php echo get_permalink($parent); ?>"> <?php echo get_the_title($parent); ?></a> </h2>
                <ul class=" min-list">
                    <?php
                    if ($parent) {
                        $findChild = $parent;
                    } else {
                        $findChild = get_the_ID();
                    }
                    wp_list_pages(array(
                        'title_li' => NULL,
                        'child_of' => $findChild,
                        'sort_col' => 'menu_order',
                    ));



                    ?>
                </ul>
            </div>
        <?php } ?>

        <div class="generic-content">
            <form class="search-form" method="get" action="<?php echo esc_url(site_url('/'));  ?>">
                <label class="headline headline--medium" for="s"> Perform New Search </label>
                <div class="search-form-row">
                    <input class="s" id="s" type="search" name="s">
                    <input class="search-submit" type="submit" type="search">
                </div>
            </form>
        </div>

    </div>

<?php }



get_footer();


?>