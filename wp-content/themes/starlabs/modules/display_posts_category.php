<?php
$category_selection = $module['category_selection'];
$category_relation = $module['relation'];


?>

<?php
if ($category_selection == 'By default') {
    $lastBlog = new WP_Query('type=post');

    if ($lastBlog->have_posts()) :

        while ($lastBlog->have_posts()) : $lastBlog->the_post(); ?>

            <?php the_title();
            the_content(); ?>

        <?php endwhile;

    endif;

    wp_reset_postdata();
} else {
    foreach ($category_relation as $value) : ?>

        <h2><?php echo $value->post_title; ?></h2>
        <p><?php echo $value->post_content; ?></p>

<?php endforeach;
}

?>