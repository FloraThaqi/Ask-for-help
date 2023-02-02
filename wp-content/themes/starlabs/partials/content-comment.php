<!-- Comment Section -->
<?php wp_enqueue_script('comment-reply'); ?>
<section class="bg-gray-100 0 py-4">
    <div class=" mx-auto px-4">
        <?php
                $args = array(
                    'comment_field' =>
                        '<div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 block">
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

    </div>
    <ol class="commentlist">


        <?php 
        // Sort comments
        include get_template_directory() . '/partials/content-sort.php'; 
  
              //Display the list of comments
                    wp_list_comments(array(
                        'per_page' => -1,
                        'reverse_top_level' => true
                    ), $comments);
        ?>
    </ol>
    <?php
                if (is_single() && comments_open() && get_option('thread_comments')) {   ?>
    <?php wp_enqueue_script('comment-reply'); ?>
    <?php   } ?>

</section>