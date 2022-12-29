

<?php
get_header();
    $question_title = get_field('question_title');
    $question_description = get_field('question_description');
    $question_date = get_field('question_date');
?>

    <div class="min-h-fit p-10 shadow-lg shadow-zinc-400 bg-slate-50 m-5">
        <div class="m-5 p-5 text-center bg-slate-100">
            <?php if($question_title):?>
            <h3 class="text-4xl"><?php echo $question_title ?></h3>
            <?php endif;?>
        </div>
        <div class="text-center m-5 p-5">
            <?php if($question_description):?>
            <p><?php echo $question_description ?></p>
            <?php endif;?>
        </div>
        <div class="">
            <?php if($question_date):?>
            <p class="text-xs">
                
                <?php 
                    echo $question_date;
                ?>
                <p></p>
                <?php     
                    $author_name  =  get_the_author_meta( 'display_name', get_current_user_id());
                    echo $author_name;
                ?> 
            <?php endif;?>
        </div>
        <div class="">
            
        </div>
    </div>
   <?php get_footer();?>