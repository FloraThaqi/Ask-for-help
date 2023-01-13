<?php
    get_header();
    $question_title = get_field('question_title');
    $question_description = get_field('question_description');
    $question_date = get_field('question_date');
    wp_enqueue_script( 'comment-reply' ); 
?>
<div class="container mx-auto flex flex-col md:flex-row my-3">
    <div class=" mx-auto md:pt-5 pb-0 shadow-zinc-400  md:m-5 w-full ">
        <div class="mb-3">
            <div class="p-5 text-left ">
                <?php if($question_title):?>
                <h3 class="text-4xl font-bold"><?php echo $question_title ?></h3>
                <?php endif;?>
            </div>
            <div class="p-5 text-slate-500 ">
                <?php if($question_description):?>
                <p><?php echo $question_description ?></p>
                <?php endif;?>
            </div>
            <div class="mb-0 text-slate-500  px-5 pt-2 text-xs text-right flex justify-end">
                <p class="mr-5"><?php echo get_the_date() ?></p>
                <p>by:
                    <?php
                    $post_id = get_the_ID();
                    $author_id = get_post_field( 'post_author', $post_id );
                            $author_name  =  get_the_author_meta( 'display_name', $author_id);
                            echo $author_name;
                        ?>
                </p>
            </div>
        </div>

        <div class="h-[2px] my-10 bg-[#4767C9]"></div>

        <!-- Comment Section -->


        <section class="bg-gray-100 0 py-4">
            <div class=" mx-auto px-4">


                <?php 
        $args=array(
          
            'comment_field' => '
             <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 block">
            <textarea id="comment" rows="6" name="comment"
            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none "
            placeholder="Help with an answer..." required></textarea>
            </div>', 
            'cancel_reply_link'    => __( 'Cancel' ),
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
            if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {   ?>
            <?php wp_enqueue_script( 'comment-reply' ); ?>
            <?php   } ?>

        </section>

    </div>

    <div class="w-full md:w-[30%]">
        <?php get_sidebar();?>
    </div>
</div>



<?php get_footer();?>


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