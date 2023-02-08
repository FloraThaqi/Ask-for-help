<div class="relative inline-flex float-right">

  <select class="border border-gray-300 rounded-full text-black h-10 pl-5 pr-10 bg-white hover:border-gray-400 focus:outline-none appearance-none" id="filter-select">
    <option >Filter by</option>
    <option >All questions</option>
    <option >Solved</option>
    <option >Not Solved</option>
  </select>
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


<script>
document.getElementById("filter-select").addEventListener("change", function() {
  var selectedOption = this.value;
  
  if (selectedOption === "All questions") {
    window.location.href = "?";
  } else if (selectedOption === "Solved") {
    window.location.href = "?filter=solved";
  } else if (selectedOption === "Not Solved") {
    window.location.href = "?filter=notsolved";
  }
  
  localStorage.setItem("selectedOption", selectedOption);
});

var storedOption = localStorage.getItem("selectedOption");

if (storedOption) {
  document.getElementById("filter-select").value = storedOption;
}


</script>