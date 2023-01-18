<?php 
/* 
Template Name: My Questions
*/  
    get_header();

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
                'posts_per_page' => 10,
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

                            <div class="hidden overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center"
                                id="modal-id">
                                <div class="relative w-auto my-6 mx-auto max-w-6xl">
                                    <!--content-->
                                    <div
                                        class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none">
                                        <!--header-->
                                        <div
                                            class="flex items-start justify-between p-5 border-b border-solid border-slate-200 rounded-t">
                                            <h3 class="text-3xl font-semibold">
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
                                                <div class="md:flex mb-6 p-2 lg:mt-0 rounded shadow bg-white">
                                                    <div class="md:w-1/3">
                                                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                                            Question Title
                                                        </label>
                                                    </div>
                                                    <div class="md:w-[350px]">
                                                        <input class="form-input block w-full focus:bg-white border border-gray-300 rounded pl-1" id="my-textfield" type="text" value="" placeholder="Title">
                                                    </div>
                                                </div>
                                                
                                                <div class="md:flex mb-6 p-2 lg:mt-0 rounded shadow bg-white">
                                                    <div class="md:w-1/3">
                                                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textarea">
                                                            Question Description
                                                        </label>
                                                    </div>
                                                    <div class="md:w-[350px]">
                                                        <textarea class="form-textarea block w-full focus:bg-white border border-gray-300 rounded pl-1" id="my-textarea" value="" rows="8" placeholder="Description"></textarea>
                                                    </div>
                                                </div>

                                                <div class="md:flex mb-6 p-2 lg:mt-0 rounded shadow bg-white">
                                                    <div class="md:w-[350px]">
                                                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-select">
                                                            Choose a Category
                                                        </label>
                                                    </div>
                                                    <div class="md:w-2/3">
                                                        <select name="" class="form-select block w-full focus:bg-white border border-gray-300 rounded pl-1" id="my-select">
                                                            <option value="Default">Category</option>
                                                            <option value="Programming">Programming</option>
                                                            <option value="Art">Art</option>
                                                            <option value=" Books"> Books</option>
                                                            <option value="Cars">Cars</option>
                                                            <option value=" Food"> Food</option>
                                                            <option value=" Gaming"> Gaming</option>
                                                            <option value="IT">IT</option>
                                                            <option value=" Movies"> Movies</option>
                                                            <option value=" Other Categories"> Other Categories</option>
                                                            <option value="Science">Science</option>
                                                            <option value="Sports">Sports</option>
                                                            
                                                        </select>
                                                    </div>
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
                                                class="bg-emerald-500 text-white active:bg-emerald-600 font-bold uppercase text-sm px-6 py-3 rounded shadow hover:shadow-lg outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                                                type="button" onclick="toggleModal('modal-id')">
                                                Save Changes
                                            </button>
                                        </div>
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
                                $category = get_the_category();
                                if($category){
                                    $cat_name = $category[0]->cat_name;
                                }else{
                                    $cat_name = 'N/A';
                                }
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
                            
                        echo paginate_links(array(
                            'base' => get_pagenum_link(1) . '%_%',
                            'format' => '/page/%#%',
                            'current' => $current_page,
                            'total' => $total_pages,
                            'prev_text'    => __('« Prev'),
                            'next_text'    => __('Next »'),
                            'before_page_number' => '<span class="p-2">',
                            'after_page_number' => '</span>',
                        ));
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
</script>