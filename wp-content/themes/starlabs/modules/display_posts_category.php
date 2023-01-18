<?php
$category_selection = $module['category_selection'];
$category_relation = $module['relation'];
$byDefault_relation = $module['by_default_relation'];
$cat_name = $byDefault_relation->name;

$currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
$arguments = array('posts_per_page' => 3, 'paged' => $currentPage);
query_posts($arguments);

$args = array(
    'post_type' => 'questions',
    'tax_query' => array(
        array(
            'taxonomy' => 'field',
            'field' => 'slug',
            'terms' => $cat_name
        )
    ),
    'posts_per_page' => 3,
    'paged' => $currentPage
);
?>
<section class="">
    <?php if ($category_selection == 'By default') {
        $wp_query = new WP_Query($args); ?>
        <div class="w-full m-auto max-lg:mx-4">
            <?php if ($wp_query->have_posts()) : ?>
                <div class="w-full m-auto py-8">
                    <?php while ($wp_query->have_posts()) : $wp_query->the_post(); ?>
                        <div class="border-y-[1px] border-x-[0.5px] bg-white border-gray-200 border-collapse p-4 mb-3">
                            <?php
                            $title_variable = get_field('question_title');
                            $description_variable = get_field('question_description');
                            $date_variable = get_field('question_date');
                            ?>
                            <div class="flex max-md:justify-between">
                                <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="user profile">
                                <p class="text-gray-500 leading-8 mr-2">Asked on: <?php echo $date_variable; ?> | </p>
                                <a class="text-gray-500 leading-8">In: <?php echo $cat_name ?></a>
                            </div>
                            <div class="text-gray-500 w-full m-auto my-2">
                                <h2 class="mb-2 text-gray-800 font-bold"><?php echo $title_variable; ?></h2>
                                <p class="">
                                <p class=""><?php $desc_string = strval($description_variable);
                                            echo substr($desc_string, 0, 200); ?><b> . . .</b></p>
                                </p>
                            </div>
                            <div class="flex justify-end  min-h-[40px] items-center w-full mx-auto">
                                <a class="min-w-[80px] h-[35px] bg-black text-white flex justify-center items-center mr-3 rounded" href="<?php echo the_permalink(); ?>">Answer</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    <?php wp_reset_postdata();
    } else { ?>
        <div class="w-full m-auto max-lg:mx-4">
            <div class="w-full m-auto py-8">
            <?php foreach ($category_relation as $value) : ?>
                    <div class="border-y-[1px] border-x-[0.5px] bg-white border-gray-200 border-collapse p-4 mb-3">
                        <?php
                        $title_variable = get_field('question_title', $value->ID);
                        $description_variable = get_field('question_description', $value->ID);
                        $date_variable = get_field('question_date', $value->ID);
                        $getslugid = wp_get_post_terms($value->ID, 'field');
                        $getslug = $getslugid[0]->name;
                        ?>
                        <div class="flex max-md:justify-between">
                            <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="user profile">
                            <p class="text-gray-500 leading-8 mr-2">Asked on: <?php echo $date_variable; ?> | </p>
                            <a class="text-gray-500 leading-8">In: <?php echo $getslug ?></a>
                        </div>
                        <div class="text-gray-500 w-full m-auto my-2">
                            <h2 class="mb-2 text-gray-800 font-bold"><?php echo $title_variable; ?></h2>
                            <p class="">
                            <p class=""><?php $desc_string = strval($description_variable);
                                        echo substr($desc_string, 0, 200); ?><b> . . .</b></p>
                            </p>
                        </div>
                        <div class="flex justify-end  min-h-[40px] items-center w-full mx-auto">
                            <a class="min-w-[80px] h-[35px] bg-black text-white flex justify-center items-center mr-3 rounded" href="<?php echo the_permalink($value->ID); ?>">Answer</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    <?php }; ?>
    <a><?php next_posts_link('<< Previous'); ?></a>
    <a><?php previous_posts_link('Next >>'); ?></a>
    <?php wp_reset_query(); ?>
</section>