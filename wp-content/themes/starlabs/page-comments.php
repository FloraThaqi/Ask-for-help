<?php get_header();
    
/*
    Template Name:Comment
*/ 

?>


<?php

    $comments = get_comments( $args='' );
    $default_pic="https://rugby.vlaanderen/wp-content/uploads/2018/03/Anonymous-Profile-pic.jpg";

?>
<?php  echo comment_form()?>

<section class="bg-white 0 py-8 lg:py-16">
    <div class="max-w-3xl mx-auto px-4">




        <?php foreach ( $comments as $comment ) :?>

        <article class="p-6 mb-6 text-base border bg-white rounded-lg 0">
            <footer class="flex justify-between items-center mb-2">
                <div class="flex items-center">
                    <?php if($comment->comment_author): ?>
                    <p class="inline-flex items-center mr-3 text-sm "><img class="mr-2 w-6 h-6 rounded-full"
                            src="<?php echo $default_pic ?>" alt="Michael Gough"><?php echo $comment->comment_author ?>
                    </p>
                    <?php else :?>
                    <p class="inline-flex items-center mr-3 text-sm "><img class="mr-2 w-6 h-6 rounded-full"
                            src="<?php echo $default_pic ?>" alt="Michael Gough">Anonymous
                    </p>
                    <?php endif ?>
                    <p class="text-sm text-gray-600 "><time pubdate datetime="2022-02-08"
                            title="February 8th, 2022"><?php echo $comment->comment_date ?></time></p>
                </div>


            </footer>
            <p class="text-gray-500 -400"><?php echo $comment->comment_content ?></p>
            <div class="flex items-center mt-4 space-x-4">
                <button type="button" class="flex items-center text-sm text-gray-500 hover:underline ">
                    <svg aria-hidden="true" class="mr-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z">
                        </path>
                    </svg>
                    Reply
                </button>
            </div>
        </article>
        <?php endforeach;?>

    </div>
</section>



<?php get_footer();?>