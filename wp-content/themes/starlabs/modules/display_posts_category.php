<?php
$category_selection = $module['category_selection'];
$category_relation = $module['relation'];
$byDefault_relation = $module['by_default_relation'];
$test = get_field('');

echo var_dump($test);
?>

<?php
$args = array(
    'post_type' => 'questions',
    'cat' => $byDefault_relation
); ?>
<section class="bg-white">
    <?php if ($category_selection == 'By default') {
        $lastBlog = new WP_Query($args); ?>
        <div class="max-w-[1008px] m-auto my-10 max-lg:mx-4">
            <?php if ($lastBlog->have_posts()) : ?>
                <div class="max-w-[700px] m-auto py-8">
                    <?php while ($lastBlog->have_posts()) : $lastBlog->the_post(); ?>
                        <div class="border-y-[1px] border-x-[0.5px] border-gray-200 border-collapse p-4">
                            <div class="flex max-md:justify-between">
                                <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="user profile">
                                <p class="text-gray-500 mr-2">Asked on: 01.01.2023</p>
                                <p class="text-gray-500">In: England</p>
                            </div>
                            <div class="text-gray-500 max-w-[620px] m-auto my-2">
                                <h2 class="mb-2 text-gray-800 font-bold"><?php the_title(); ?></h2>
                                <p class=""><?php the_content(); ?></p>
                            </div>
                            <div class="flex justify-end bg-gray-200 min-h-[60px] items-center max-w-[620px] mx-auto">
                                <a class="min-w-[80px] h-[35px] bg-black text-white flex justify-center items-center mr-3 rounded" href="">Answer</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php wp_reset_postdata();
    } else { ?>
        <div class="max-w-[1008px] m-auto my-10 max-lg:mx-4">
            <div class="max-w-[700px] m-auto py-8">
                <?php foreach ($category_relation as $value) : ?>
                    <div class="border-y-[1px] border-x-[0.5px] border-gray-200 border-collapse p-4">
                        <div class="flex max-md:justify-between">
                            <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="user profile">
                            <p class="text-gray-500 mr-2">Asked on: 01.01.2023</p>
                            <p class="text-gray-500">In: England</p>
                        </div>
                        <div class="text-gray-500 max-w-[620px] m-auto my-2">
                            <h2 class="mb-2 text-gray-800 font-bold"><?php echo $value->post_title; ?></h2>
                            <p class=""><?php echo $value->post_content; ?></p>
                        </div>
                        <div class="flex justify-end bg-gray-200 min-h-[60px] items-center max-w-[620px] mx-auto">
                            <a class="min-w-[80px] h-[35px] bg-black text-white flex justify-center items-center mr-3 rounded" href="">Answer</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php }
    ?>
</section>