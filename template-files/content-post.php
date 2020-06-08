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