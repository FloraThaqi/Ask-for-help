<?php 
/* 
Template Name: My Questions
*/  
    get_header();

    ?>

<!-- Add new question -->
<?php
    global $wpdb;
    
    if ( isset( $_POST['submit'] ) && wp_verify_nonce($_POST['my_form_nonce'],'my_form_submit') ){

        if(current_user_can('publish_posts')){


            $post_title =sanitize_text_field($_POST['question_title']);
            $post_category =  $_POST['question_category'];

            $post_data=array(
                'post_title'=>$post_title,
                'post_status'=>'publish',
                'post_type'=>'questions',
                'tax_input' => array( 'field' => array($post_category) ),
            );

            //insert the post into the database

            $post_id=wp_insert_post($post_data);
    
            //Update the ACF field
            update_field('question_title',sanitize_text_field($_POST['question_title']),$post_id);

            update_field('question_description',sanitize_text_field($_POST['question_description']),$post_id);

    }
}

?>
<div class="container mx-auto flex flex-col md:flex-row  pt-16 ">
    <div class="w-full flex">
        <div class="w-full md:w-[70%]">
            <section class="">
                <div class="w-full m-auto max-lg:mx-4">
                    <h1 class="text-black text-center text-4xl font-bold p-5 mb-5">My Questions</h1>
                    <?php
        $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
               $args = array(
                'post_type' => 'questions',
                'author' => get_current_user_id(),
                'orderby' => 'date',
                'order' => 'DESC',
                'posts_per_page' => 2,
                'paged' => $paged,
            );
                $lastBlog = new WP_Query( $args ); ?>
                    <div class="w-full m-auto max-lg:mx-4">

                        <!-- Add new question -->
                        <div class="flex justify-between  flex-wrap">
                            <h4 class="text-black text-left text-3xl font-bold mt-5 ">My Questions</h4>
                            <button type="button"
                                class="px-4 py-3 bg-[#4767C9]  text-white font-display text-xs uppercase rounded hover:bg-[#4767D9] mt-5 "
                                onclick="toggleModal('modal-id')">
                                Add new question
                            </button>

                            <!-- Main modal -->

                            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 top-10 z-50 outline-none focus:outline-none justify-center items-center shadow-sm"
                                id="modal-id">
                                <div class="relative w-auto my-6 mx-auto max-w-6xl">
                                    <!--content-->
                                    <div
                                        class="border-0 rounded-lg -lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                        <!--header-->
                                        <div
                                            class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                                            <h3 class="text-2xl font-semibold">
                                                Add a new question
                                            </h3>
                                            <button
                                                class="p-1 ml-auto bg-transparent border-0 text-black  float-right text-3xl leading-none font-semibold outline-none focus:outline-none"
                                                onclick="toggleModal('modal-id')">
                                                <span
                                                    class="bg-transparent text-black opacity-50 hover:opacity-100 h-6 w-6 text-2xl block outline-none focus:outline-none">
                                                    <span class="dashicons dashicons-no text-2xl"></span>
                                                </span>
                                            </button>
                                        </div>
                                        <!--body-->
                                        <div class="relative p-6 flex-auto">
                                            <form method="post" action="" id="myform">
                                                <?php wp_nonce_field('my_form_submit', 'my_form_nonce') ?>
                                                <div class="flex flex-wrap p-2 mt-0 rounded  bg-white">
                                                    <label
                                                        class="block text-gray-600 font-bold md:text-left mb-3 w-full"
                                                        for="my-textfield">
                                                        Question Title
                                                    </label>
                                                    <input
                                                        class=" py-2 form-input block w-full focus:bg-white border border-gray-300 rounded pl-1"
                                                        id="question_title" name="question_title" type="text" value=""
                                                        placeholder="Title" required>


                                                </div>

                                                <div class="flex flex-wrap p-2 mt-0 rounded  bg-white">
                                                    <label
                                                        class="block text-gray-600 font-bold md:text-left mb-3 w-full"
                                                        for="my-textfield">
                                                        Question Description
                                                    </label>
                                                    <textarea
                                                        class="form-textarea block w-full focus:bg-white border border-gray-300 rounded pl-1"
                                                        value="" rows="8" placeholder="Description"
                                                        id="question_description" name="question_description"
                                                        required></textarea>


                                                </div>

                                                <div class="flex flex-wrap p-2 mt-0 rounded  bg-white">
                                                    <label
                                                        class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4"
                                                        for="my-select">
                                                        Choose a Category
                                                    </label>
                                                    <select name="question_category" id="question_category "
                                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 p-3"
                                                        required>
                                                        <?php
                                                          $terms = get_terms( array(
                                                                    'taxonomy' => 'field',
                                                                    'hide_empty' => false,
                                                                        ) );
                                                            foreach ( $terms as $term ) {
                                                                        echo '<option value="' . esc_attr( $term->term_id ) . '">' . esc_html( $term->name ) . '</option>';
                                                                        }
                                                        ;?>
                                                    </select>
                                                </div>

                                        </div>


                                        <!--footer-->
                                        <div
                                            class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b">
                                            <button
                                                class="text-red-500 background-transparent font-bold uppercase px-6 py-2 text-sm outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                type="button" onclick="toggleModal('modal-id')">
                                                Close
                                            </button>
                                            <button
                                                class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded  hover:-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                type="submit" name="submit">
                                                Create
                                            </button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                            <div class="hidden opacity-25 fixed inset-0 z-40 bg-black" id="modal-id-backdrop"></div>
                            <?php if ($lastBlog->have_posts()) : ?>
                            <div class="w-full m-auto py-8">
                                <?php while ($lastBlog->have_posts()) : $lastBlog->the_post(); 
                                $title_variable = get_field('question_title');
                                $description_variable = get_field('question_description');
                                $date_variable = get_field('question_date');
                                $terms = get_the_terms( get_the_ID(), 'field' );
                                if ( $terms && ! is_wp_error( $terms ) ) : 
                                $cat_name = $terms[0]->name;
                                endif;
                            ?>
                                <div
                                    class="border-y-[1px] border-x-[0.5px] bg-white border-gray-200 border-collapse p-4 mb-3">
                                    <div class="flex max-md:justify-between">
                                        <img class="w-8 h-8 rounded-3xl mr-2 border-sky-600 border-2 p-[1px]"
                                            src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                            alt="user profile">
                                        <p class="text-gray-500 leading-8 mr-2">Asked on: <?php echo $date_variable; ?>
                                            | </p>
                                        <a class="text-gray-500 leading-8">In: <?php echo $cat_name ?></a>
                                    </div>
                                    <div class="text-gray-500 w-full m-auto my-2">
                                        <h2 class="mb-2 text-gray-800 font-bold"><?php echo $title_variable; ?></h2>
                                        <p class="">
                                            <?php $desc_string = strval($description_variable);
                                                    echo substr($desc_string, 0, 200); ?><b> . . .</b>
                                        </p>
                                    </div>
                                    <div class="flex justify-end  min-h-[40px] items-center w-full mx-auto">
                                        <a class="min-w-[80px] h-[35px] bg-black text-white flex justify-center items-center mr-3 rounded"
                                            href="<?php echo the_permalink(); ?>">Answer</a>
                                    </div>
                                </div>
                                <?php endwhile; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                        <!-- Pagination -->
                        <div class="p-2 text-right">
                            <?php
                    $total_pages = $lastBlog->max_num_pages;

                    if ($total_pages > 1){
                            
                        $current_page = max(1, get_query_var('paged'));
                            
                        $pagination = paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'prev_text' => '<',
                            'next_text' => '>',
                        ));

                        $pagination = str_replace( 'current', 'w-10 h-10 flex justify-center items-center p-2 rounded-full border border-gray-300 text-white font-bold bg-[#1e90ff]' , $pagination );

                        $pagination = str_replace( '<a', '<a class="w-10 h-10 flex justify-center items-center p-2 rounded-full border border-gray-300 text-gray-400 font-bold hover:bg-gray-200"', $pagination );
                        echo $pagination;
                    }
                    ?>
                        </div>
                        <?php wp_reset_postdata(); ?>
            </section>
        </div>
        <div class="w-full md:w-[30%] pt-16">


            <?php get_sidebar();?>
        </div>
    </div>
</div>

<?php get_footer();?>




<script type="text/javascript">
function toggleModal(modalID) {
    document.getElementById(modalID).classList.toggle("hidden");
    document.getElementById(modalID + "-backdrop").classList.toggle("hidden");
    document.getElementById(modalID).classList.toggle("flex");
    document.getElementById(modalID + "-backdrop").classList.toggle("flex");
}

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>