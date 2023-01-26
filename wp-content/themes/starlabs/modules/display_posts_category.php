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
        <div class="w-full m-auto max-lg:mx-0">
            <?php if ($lastBlog->have_posts()) : ?>
                <div class="w-full m-auto py-8">
                    <?php while ($lastBlog->have_posts()) : $lastBlog->the_post(); ?>
                        <div class="border-y-[1px] border-x-[0.5px] bg-white border-gray-200 border-collapse p-4 mb-3">
                            <?php
                            $title_variable = get_field('question_title');
                            $description_variable = get_field('question_description');
                            $date_variable = get_field('question_date');
                            $post_ID = get_the_ID();
                            $author_id = get_the_author_meta('ID');
                            $author_url = get_author_posts_url($author_id);
                            $close = get_field('close');
                            gt_set_post_views($post_ID);
                            ?>
                            <div class="flex max-md:flex-wrap">
                                <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="user profile">
                                <p class="text-gray-500 leading-8 mr-2">Asked on: <?php echo $date_variable; ?> | </p>
                                <a class="text-gray-500 leading-8 mr-2">In: <?php echo $cat_name ?> | </a>
                                <div class="flex">
                                    <a class="text-gray-500 leading-8 mr-2">Posted by: <?php echo '<a class="text-gray-500 leading-8 mr-2 hover:text-sky-600 max-md:text-sky-600" href="' . $author_url . '">' . get_the_author() . '</a>'; ?></a>
                                </div>
                                <div class="absolute top-0 right-0">
                                    <?php
                                    global $user_ID;
                                    $post_id = get_the_ID();
                                    $author_id = get_post_field('post_author', $post_id);
                                    if (!$close) : ?>
                                        <?php if ($author_id == $user_ID) : ?>
                                            <form action="" method="POST">

                                                <button type="submit" id=<?php echo $post_ID; ?> name=<?php echo $post_ID; ?> class="bg-transparent rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none ">
                                                    <p class=" text-slate-500 text-lg">Mark as solved</p>
                                                </button>
                                            </form>
                                        <?php else : ?>
                                        <?php endif; ?>
                                        <?php
                                        if (isset($_POST[$post_ID])) {
                                            update_field('close', 1, $post_ID);
                                            echo "<script type='text/javascript'>
                                            location.reload();
                                            </script>";
                                        }
                                        ?>
                                    <?php else : ?>
                                        <div class="w-16  overflow-hidden inline-block relative">
                                            <div class=" h-8  bg-green-600 -rotate-45 ">
                                            </div>
                                            <div>
                                                <p class=" text-black font-bold text-lg absolute top-0 ">Solved </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
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
                                <div class="flex">
                                    <svg class="w-4 h-4 fill-slate-500 leading-8 mt-2 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z" />
                                    </svg>
                                    <?php if (gt_get_post_views($post_ID) !== ' views') { ?>
                                        <p class="text-gray-500 leading-8 mr-2"><?= gt_get_post_views($post_ID); ?></p>
                                    <?php } else { ?>
                                        <p class="text-gray-500 leading-8 mr-2">0 Views</p>
                                    <?php }; ?>
                                </div>
                                <a class="min-w-[80px] h-[35px] bg-black text-white flex justify-center items-center mr-3 rounded" href="<?php echo the_permalink(); ?>">Answer</a>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
        <!-- Pagination in case IF-->
        <div class="p-2 mb-2 flex flex-row justify-end items-end gap-1">
            <?php
            $total_pages = $lastBlog->max_num_pages;

            if ($total_pages > 1) {

                $current_page = max(1, get_query_var('paged'));

                $pagination = paginate_links(array(
                    'base' => get_pagenum_link(1) . '%_%',
                    'format' => '/page/%#%',
                    'current' => $current_page,
                    'total' => $total_pages,
                    'prev_text' => '<',
                    'next_text' => '>',
                ));

                $pagination = str_replace('current', 'w-10 h-10 flex justify-center items-center p-2 rounded-full border border-gray-300 text-white font-bold bg-[#1e90ff]', $pagination);

                $pagination = str_replace('<a', '<a class="w-10 h-10 flex justify-center items-center p-2 rounded-full border border-gray-300 text-gray-400 font-bold hover:bg-gray-200"', $pagination);
                echo $pagination;
            }
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
                            $author_id = $value->post_author;
                            $author_url = get_author_posts_url($author_id);
                            $author_name = get_the_author_meta('display_name', $author_id);
                            ?>
                            <div class="flex max-md:flex-wrap">
                                <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="user profile">
                                <p class="text-gray-500 leading-8 mr-2">Asked on: <?php echo $date_variable; ?> | </p>
                                <a class="text-gray-500 leading-8 mr-2">In: <?php echo $getslug ?> |</a>
                                <a class="text-gray-500 leading-8 mr-2">Posted by: <?php echo '<a class="text-gray-500 leading-8 mr-2 hover:text-sky-600 max-md:text-sky-600" href="' . $author_url . '">' . $author_name . '</a>'; ?></a>
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
                                    <svg class="w-4 h-4 fill-slate-500 leading-8 mt-2 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                        <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                        <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z" />
                                    </svg>
                                    <?php
                                    if (gt_get_post_view($value->ID) !== ' views') { ?>
                                        <p class="text-gray-500 leading-8 mr-2"><?= gt_get_post_views($value->ID); ?></p>
                                    <?php } else { ?>
                                        <p class="text-gray-500 leading-8 mr-2">0 Views</p>
                                    <?php }; ?>
                                </div>
                                <a class="min-w-[80px] h-[35px] bg-black text-white flex justify-center items-center mr-3 rounded" href="<?php echo the_permalink($value->ID); ?>">Answer</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    <!-- Pagination in case ELSE-->
                    <div class="p-2 mb-2 flex flex-row justify-end items-end gap-1">
                        <?php
                        $total_pages = ceil(count($category_relation) / $posts_per_page);
                        $current_page = max(1, get_query_var('paged'));
                        $pagination = paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'prev_text' => '<',
                            'next_text' => '>',
                        ));

                        $pagination = str_replace('current', 'w-10 h-10 flex justify-center items-center p-2 rounded-full border border-gray-300 text-white font-bold bg-[#1e90ff]', $pagination);

                        $pagination = str_replace('<a', '<a class="w-10 h-10 flex justify-center items-center p-2 rounded-full border border-gray-300 text-gray-400 font-bold hover:bg-gray-200"', $pagination);
                        echo $pagination;
                        ?>
                    </div>
                </div>
            </div>
    <?php };
    }; ?>
</section>