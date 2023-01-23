<?php
get_header();
$question_title = get_field('question_title');
$question_description = get_field('question_description');
$question_date = get_field('question_date');
wp_enqueue_script('comment-reply');
gt_set_post_view();
?>
<div class="container mx-auto flex flex-col md:flex-row  pt-16 ">
    <div class=" mx-auto md:pt-5 pb-0 shadow-zinc-400  md:m-5 w-full ">
        <div class="mb-3">
            <div class="p-5 text-left ">
                <?php if ($question_title) : ?>
                <h3 class="text-4xl font-bold"><?php echo $question_title ?></h3>
                <?php endif; ?>
            </div>
            <div class="p-5 text-slate-500 ">
                <?php if ($question_description) : ?>
                <p><?php echo $question_description ?></p>
                <?php endif; ?>
            </div>
            <div class="mb-0 text-slate-500 px-5 pt-2 text-xs flex justify-between">
                <div class="flex min-w-[90px]">
                    <svg class="w-4 h-4 mr-2 fill-slate-500" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                        <path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM432 256c0 79.5-64.5 144-144 144s-144-64.5-144-144s64.5-144 144-144s144 64.5 144 144zM288 192c0 35.3-28.7 64-64 64c-11.5 0-22.3-3-31.6-8.4c-.2 2.8-.4 5.5-.4 8.4c0 53 43 96 96 96s96-43 96-96s-43-96-96-96c-2.8 0-5.6 .1-8.4 .4c5.3 9.3 8.4 20.1 8.4 31.6z" />
                    </svg>
                    <div>
                        <p class="min-w-[60px]"><?= gt_get_post_view(); ?></p>
                    </div>
                </div>
                <div class="flex">
                    <p class="mr-5"><?php echo get_the_date() ?></p>
                    <p>by:
                        <?php
                        $post_id = get_the_ID();
                        $author_id = get_post_field('post_author', $post_id);
                        $author_name  =  get_the_author_meta('display_name', $author_id);
                        echo $author_name;
                        ?>
                    </p>
                </div>
            </div>
        </div>

        <div class="h-[2px] my-10 bg-[#4767C9]"></div>

        <!-- Comment Section -->


        <section class="bg-gray-100 0 py-4">
            <div class=" mx-auto px-4">


                <?php
                $args = array(

                    'comment_field' => '
             <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 block">
            <textarea id="comment" rows="6" name="comment"
            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none "
            placeholder="Help with an answer..." required></textarea>
            </div>',
                    'cancel_reply_link'    => __('Cancel'),
                );

                ?>
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-lg lg:text-2xl font-bold text-gray-900 ">Answers </h2>
                </div>

                <?php comment_form($args); ?>

                <ol class="commentlist">
                    <?php
                    //Gather comments for a specific page/post 
                    $comments = get_comments(array(
                        'post_id' => get_the_ID(),
                        'status' => 'approve' //Change this to the type of comments to be displayed
                    ));

                    //Display the list of comments
                    wp_list_comments(array(
                        'per_page' => -1,
                        'reverse_top_level' => true

                    ), $comments);

                    
                    ?>

                </ol>

            </div>

            <?php
            if (is_single() && comments_open() && get_option('thread_comments')) {   ?>
            <?php wp_enqueue_script('comment-reply'); ?>
            <?php   } ?>

        </section>

    </div>

    <div class="w-full md:w-[30%] pt-16">
        <?php get_sidebar(); ?>
    </div>
</div>



<?php get_footer(); ?>


<script>
// Add cancel reply button on comment form
jQuery(function($) {
    $('.comment-reply-link', '.comment-body').on('click', function() {
        $('#cancel-comment-reply-link').insertAfter('.form-submit').addClass('button').show();
    });

    $('#cancel-comment-reply-link').on('click', function() {
        $(this).hide();
    });
});
</script>