

<div class="flex justify-end mb-2">
    <button class="text-black bg-white font-medium rounded-lg text-sm px-4 py-2.5 text-center inline-flex items-center"
        type="button" data-dropdown-toggle="dropdown">Filter by <svg class="w-4 h-4 ml-2" fill="none"
            stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7">
            </path>
        </svg></button>
    <div class="hidden bg-white text-base z-50 list-none divide-y divide-gray-100 rounded shadow my-4" id="dropdown">
        <ul class="py-1" aria-labelledby="dropdown">
            <li>
            <a href="?" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">All Questions</a>
            </li>
            <li>
                <a href="?filter=solved" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Solved</a>
            </li>
            <li>
                <a href="?filter=notsolved" class="text-sm hover:bg-gray-100 text-gray-700 block px-4 py-2">Not solved</a>
            </li>
        </ul>
    </div>
</div>
</div>
<?php
$filter = isset($_GET['filter']) ? $_GET['filter'] : '';

if ($filter == 'solved') {
    $args['posts_per_page'] = -1;
    $args['meta_query'] = array(
        array(
            'key' => 'close',
            'value' => 1,
        ),
    );
} elseif ($filter == 'notsolved') {
    $args['posts_per_page'] = -1;
    $args['meta_query'] = array(
        array(
            'key' => 'close',
            'compare' => 'NOT EXISTS',
        ),
    );
} else {
    $args['posts_per_page'] = 5;
}

$lastBlog = new WP_Query($args);
if ($lastBlog->have_posts()) {
    while ($lastBlog->have_posts()) {
        $lastBlog->the_post();

    }
    wp_reset_postdata();
}
?>              </div>

                        <script src="https://unpkg.com/@themesberg/flowbite@latest/dist/flowbite.bundle.js"></script>