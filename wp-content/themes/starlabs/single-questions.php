<?php
get_header();
    $question_title = get_field('question_title');
    $question_description = get_field('question_description');
    $question_date = get_field('question_date');
?>
<div class="min-h-fit w-[75%] mx-auto p-10 shadow-lg shadow-zinc-400 bg-slate-50 m-5">
    <div class="m-5 p-5 text-center bg-slate-100">
        <?php if($question_title):?>
        <h3 class="text-4xl"><?php echo $question_title ?></h3>
        <?php endif;?>
    </div>
    <div class="border-solid border-2 shadow-sm shadow-zinc-400 bg-slate-100 m-5 p-5">
        <?php if($question_description):?>
        <p><?php echo $question_description ?></p>
        <?php endif;?>
    </div>
    <div class="border-solid border-2 bg-slate-100 m-5 p-1">
        <?php if($question_date):?>
        <p class="text-xs"><?php echo $question_date ?></p>
        <?php endif;?>
    </div>
</div>

<!-- Comment Section -->


<section class="bg-white 0 py-8 lg:py-16">
    <div class="max-w-3xl mx-auto px-4">


        <?php 
        $args=array(
          
            'comment_field' => '
             <div class="py-2 px-4 mb-4 bg-white rounded-lg rounded-t-lg border border-gray-200 ">
            <textarea id="comment" rows="6" name="comment"
            class="px-0 w-full text-sm text-gray-900 border-0 focus:ring-0 focus:outline-none "
            placeholder="Write a comment..." required></textarea>
            </div>',

        );
        ?>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-lg lg:text-2xl font-bold text-gray-900 ">Comment </h2>
        </div>

        <?php comment_form($args); ?>

        <ol class="commentlist">
            <?php
		//Gather comments for a specific page/post 
		$comments = get_comments(array(
			'post_type' => 'questions',
			'status' => 'approve' //Change this to the type of comments to be displayed
		));

		//Display the list of comments
		wp_list_comments(array(
			'per_page' => -1, 
			'reverse_top_level' => false
            
		), $comments);
	?>
        </ol>
    </div>
</section>



<?php get_footer();?>