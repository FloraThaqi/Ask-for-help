<?php
$category_selection = $module['category_selection'];
$category_relation = $module['relation'];
$byDefault_relation = $module['by_default_relation'];

$currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;

?>
<section class="">
    <?php if ($category_selection == 'By default') {
        $cat_name = $byDefault_relation->name;

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
        $lastBlog = new WP_Query($args); ?>
    <div class="w-full md:container m-auto max-lg:mx-0">
        <?php if ($lastBlog->have_posts()) : ?>
        <div class="w-full m-auto py-8">
            <?php while ($lastBlog->have_posts()) : $lastBlog->the_post(); ?>
            <div class="border-y-[1px] border-x-[0.5px] bg-white border-gray-200 border-collapse p-4 mb-3 ">
                <?php 
                // Get Fields
                     include get_template_directory() . '/partials/content-get-field.php'; 
                ?>
                <div class="flex max-md:justify-between relative flex-col md:flex-row">
                    <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]"
                        src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                        alt="user profile">
                    <p class="text-gray-500 leading-8 mr-2">Asked on: <?php echo $date_variable; ?> | </p>
                    <a class="text-gray-500 leading-8 mr-2">In: <?php echo $cat_name ?> | </a>
                    <div class="flex">
                        <a class="text-gray-500 leading-8 mr-2">Posted by:
                            <?php echo '<a class="text-gray-500 leading-8 mr-2 hover:text-sky-600 max-md:text-sky-600" href="' . $author_url . '">' . get_the_author() . '</a>'; ?></a>
                    </div>

                    <!-- Mark as solved and Solved Section -->
                    <div class="absolute top-0 right-0">
                        <?php get_template_part('partials/content','solved'); ?>
                    </div>
                </div>
                <div class="text-gray-500 w-full m-auto my-2">
                    <h2 class="mb-2 text-gray-800 font-bold"><?php echo $title_variable; ?></h2>
                    <p class="">
                    <p class=""><?php $desc_string = strval($description_variable);
                                            echo substr($desc_string, 0, 200); ?><b> . . .</b></p>
                    </p>
                </div>
                <div class="flex justify-between  min-h-[40px] items-center w-full mx-auto">
                    <!--Content view with ID  -->
                    <div class="flex">
                        <?php get_template_part('partials/content','viewID'); ?>
                    </div>

                    <a class="min-w-[80px] h-[35px] bg-black text-white flex justify-center items-center mr-3 rounded"
                        href="<?php echo the_permalink(); ?>">Answer</a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
        <?php endif; ?>
    </div>
    <!-- Pagination-->
    <div class="p-2 mb-2 flex flex-row justify-end items-end gap-1">
        <?php
               include get_template_directory() . '/partials/content-pagination.php'
            ?>
    </div>
    <?php wp_reset_postdata();
    } else {
        $posts_per_page = 3;
        $offset = ($currentPage - 1) * $posts_per_page;
        $category_relation_pagination = array_slice($category_relation, $offset, $posts_per_page);
        if (have_posts()) {
        ?>
    <div class="w-full m-auto">
        <div class="w-full m-auto py-8">
            <?php foreach ($category_relation_pagination as $value) : ?>
            <div class="border-y-[1px] border-x-[0.5px] bg-white border-gray-200 border-collapse p-4 mb-3">
                <?php
                            gt_set_post_views($value->ID);
                            $title_variable = get_field('question_title', $value->ID);
                            $description_variable = get_field('question_description', $value->ID);
                            $date_variable = get_field('question_date', $value->ID);
                            $getslugid = wp_get_post_terms($value->ID, 'field');
                            $getslug = $getslugid[0]->name;
                            $close = get_field('close');
                            $post_ID = get_the_ID();
                            $author_id = $value->post_author;
                            $author_url = get_author_posts_url($author_id);
                            $author_name = get_the_author_meta('display_name', $author_id);
                            ?>
                <div class="flex max-md:flex-wrap relative">
                    <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]"
                        src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                        alt="user profile">
                    <p class="text-gray-500 leading-8 mr-2">Asked on: <?php echo $date_variable; ?> | </p>
                    <a class="text-gray-500 leading-8 mr-2">In: <?php echo $getslug ?> |</a>
                    <a class="text-gray-500 leading-8 mr-2">Posted by:
                        <?php echo '<a class="text-gray-500 leading-8 mr-2 hover:text-sky-600 max-md:text-sky-600" href="' . $author_url . '">' . $author_name . '</a>'; ?></a>

                    <!-- Mark as solved and Solved Section -->

                    <div class="absolute top-0 right-0">
                        <?php get_template_part('partials/content','solved'); ?>

                    </div>
                </div>
                <div class="text-gray-500 w-full m-auto my-2">
                    <h2 class="mb-2 text-gray-800 font-bold"><?php echo $title_variable; ?></h2>
                    <p class="">
                    <p class=""><?php $desc_string = strval($description_variable);
                                            echo substr($desc_string, 0, 200); ?><b> . . .</b></p>
                    </p>
                </div>
                <div class="flex justify-between min-h-[40px] items-center w-full mx-auto">
                    <div class="flex">
                        <!--Content view with ID  -->
                        <?php get_template_part('partials/content','viewID'); ?>
                    </div>
                    <a class="min-w-[80px] h-[35px] bg-black text-white flex justify-center items-center mr-3 rounded"
                        href="<?php echo the_permalink($value->ID); ?>">Answer</a>
                </div>
            </div>
            <?php endforeach; ?>
            <!-- Pagination -->

            <?php include get_template_directory() . '/partials/content-pagination.php' ?>
        </div>
    </div>
    <?php };
    }; ?>
</section>