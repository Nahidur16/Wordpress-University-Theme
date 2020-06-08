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
        'title' => 'Check All Events',
        'subtitle' => ' Events are Importent'
    )) ?>


    <div class="container container--narrow page-section">
        <?php
        while (have_posts()) {
            the_post();
            get_template_part('template-files/content-event');
        }
        echo paginate_links();

        ?>





        <hr class="section-break">


        <p> For past events <a href=" <?php echo site_url('/past-events')  ?>"> check here</a></p>

    </div>


    <?php
    get_footer();
    ?>

</body>

</html>