<?php
/* 
Template Name: My Questions
*/
get_header();

?>

<div class="container mx-auto flex flex-col md:flex-row pt-16 ">
    <div class="w-full flex">
        <div class="w-full ">
            <section class="">
                <div class="w-full m-auto">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $args = array(
                        'post_type' => 'questions',
                        'author' => get_current_user_id(),
                        'orderby' => 'date',
                        'order' => 'DESC',
                        'posts_per_page' => 5,
                        'paged' => $paged,
                    );
                    $lastBlog = new WP_Query($args); ?>
                    <div class="w-full m-auto">
                        <!-- Add new question -->
                        <?php include get_template_directory() . './add-modal.php' ?>

                        <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                        <?php if ($lastBlog->have_posts()) : ?>
                            <div class="w-full m-auto py-8">
                                <?php while ($lastBlog->have_posts()) : $lastBlog->the_post();
                                    $title_variable = get_field('question_title');
                                    $description_variable = get_field('question_description');
                                    $date_variable = get_field('question_date');
                                    $close = get_field('close');
                                    $terms = get_the_terms(get_the_ID(), 'field');
                                    $post_ID = get_the_ID();
                                    gt_set_post_views($post_ID);
                                    if ($terms && !is_wp_error($terms)) :
                                        $cat_name = $terms[0]->name;
                                    else :
                                        $cat_name = 'N/A';
                                    endif; ?>
                                    <div class="border-y-[1px] border-x-[0.5px] bg-white border-gray-200 border-collapse p-4 mb-3">
                                        <div class="flex max-md:justify-between relative">
                                            <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]" src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png" alt="user profile">
                                            <p class="text-gray-500 leading-8 mr-2">Asked on: <?php echo $date_variable; ?> |
                                            </p>
                                            <a class="text-gray-500 leading-8">In: <?php echo $cat_name ?></a>
                                            <div class="absolute top-0 right-0">
                                                <div class="">
                                                    <?php if (!$close) : ?>
                                                        <button type="button" id="button1" name="button1" class="bg-transparent rounded-md p-2 inline-flex items-center justify-center text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none ">
                                                            <p class=" text-slate-500 text-lg">Mark as solved</p>
                                                        </button>
                                                        <?php ?>
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
                                        </div>
                                        <div class="text-gray-500 w-full m-auto my-2">
                                            <h2 class="mb-2 text-gray-800 font-bold"><?php echo $title_variable; ?></h2>
                                            <p class="">
                                                <?php $desc_string = strval($description_variable);
                                                echo substr($desc_string, 0, 200); ?><b> . . .</b>
                                            </p>

                                        </div>
                                        <div class="flex">
                                            <div class="flex flex-row text-xs ">
                                                <svg class="w-4 h-4 fill-slate-500 leading-8 mt-2 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512">
                                                    <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                                                    <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z" />
                                                </svg>
                                                <?php if (gt_get_post_views($post_ID) !== ' views') { ?>
                                                    <p class="text-gray-500 leading-8 mr-2 min-w-[60px]">
                                                        <?= gt_get_post_views($post_ID); ?></p>
                                                <?php } else { ?>
                                                    <p class="text-gray-500 leading-8 mr-2 min-w-[60px]">0 Views</p>
                                                <?php }; ?>
                                            </div>

                                            <div class="flex justify-end  min-h-[40px] items-center w-full mx-auto">
                                                <a class="min-w-[80px] h-[35px] bg-indigo-500 text-white flex justify-center items-center mr-3 rounded" href="<?php echo the_permalink(); ?>">View</a>
                                                <a class="min-w-[80px] h-[35px] bg-red-500 text-white flex justify-center items-center mr-3 rounded" href="#" onClick="showModal()">Delete</a>


                                                <div id="deleteModal" class="hidden fixed top-0 left-0 w-full h-full flex items-center justify-center ">
                                                    <div class="bg-white p-6 rounded shadow-lg shadow-gray-400" ">
                                                        <svg xmlns=" http://www.w3.org/2000/svg" class="w-4 h-4 -m-1 flex items-center text-red-500 mx-auto" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                        </svg>
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-16 h-16 flex items-center text-red-500 mx-auto" viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd" />
                                                        </svg>
                                                        <p class="text-lg mb-4">Are you sure you want to delete this question?</p>
                                                        <div class="p-3  mt-2 text-center space-x-4 md:block">
                                                            <button class="bg-gray-500 text-white p-2 rounded" onClick="hideModal()">Cancel</button>
                                                            <a class="bg-red-500 text-white p-2 rounded" href="<?php echo get_delete_post_link(get_the_ID()); ?>">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endwhile; ?>

                            <?php endif; ?>
                            </div>
                            <!-- Pagination -->
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
                            <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div class="w-full md:w-[30%]">
        <?php get_sidebar(); ?>
    </div>
</div>
</div>
<?php get_footer(); ?>


<script>
    function showModal() {
        document.getElementById("deleteModal").classList.remove("hidden");
    }

    function hideModal() {
        document.getElementById("deleteModal").classList.add("hidden");
    }


    function deletePost() {

        hideModal();
    }
</script>