<?php
$category_selection = $module['category_selection'];
$category_relation = $module['relation'];
$byDefault_relation = $module['by_default_relation'];

?>

<?php
$args = array(
    'cat' => $byDefault_relation
); ?>
<section class="bg-white">
    <?php if ($category_selection == 'By default') {
        $lastBlog = new WP_Query($args); ?>
        <div class="max-w-[1008px] m-auto my-10 max-lg:mx-4">
            <?php if ($lastBlog->have_posts()) : ?>
                <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-2 max-sm:grid-cols-1 py-8">
                    <?php while ($lastBlog->have_posts()) : $lastBlog->the_post(); ?>
                        <div class="text-gray-500">
                            <h2 class="text-center mb-2 text-gray-600 font-bold"><?php the_title(); ?></h2>
                            <p class=""><?php the_content(); ?></p>
                            <p class="pt-3"><?php _e('Posted on: ', 'textdomain') . the_time('F j, Y g:i a'); ?></p>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php wp_reset_postdata();
    } else { ?>
        <div class="max-w-[1008px] m-auto my-10 max-lg:mx-4">
            <div class="grid grid-cols-3 gap-8 max-lg:grid-cols-2 max-sm:grid-cols-1 py-8">
                <?php foreach ($category_relation as $value) : ?>
                    <div class="text-gray-500">
                        <h2 class="text-center mb-2 text-gray-600 font-bold"><?php echo $value->post_title; ?></h2>
                        <p class=""><?php echo $value->post_content; ?></p>
                        <p class="pt-3"><?php echo $value->post_date; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php }
    ?>
</section>