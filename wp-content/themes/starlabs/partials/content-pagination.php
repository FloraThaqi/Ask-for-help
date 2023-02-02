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