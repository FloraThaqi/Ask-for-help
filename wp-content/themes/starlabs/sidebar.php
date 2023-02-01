<?php

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    <?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
<?php
$title = get_field('title','option');
$pages = get_field('pages','option');?>




<aside class="box-shadow shadow-lg bg-slate-200	 h-inherit rounded-b-lg w-90 lg:gap-2 ml-6 sticky top-[12%]">

    <div class="p-4">

        <h4 class="text-base px-2 font-semibold tracking-widest uppercase text-gray-600 py-4">Most Popular Questions
        </h4>
        <ul class="text-sm font-medium">
            <?php
                  $args = array(
                      'post_type' => 'questions',   
                      'meta_key' => 'post_views_count',
                      'orderby' => 'meta_value_num',
                      'order' => 'DESC',
                      'posts_per_page' => 8
                      
                  );
      
                  $most_viewed_query = new WP_Query( $args );
      
                  if ( $most_viewed_query->have_posts() ) {
                      while ( $most_viewed_query->have_posts() ) {
                          $most_viewed_query->the_post();
                      
                          echo '<li class="hover:text-[#4767c9] mx-5 text-black py-4 border-b border-slate-300 last:border-none"><a href="' . get_permalink() . '">' . get_the_title() . '</a> <span class="view-count">'  . '</span></li>'; // . gt_get_post_view($post_id)
                      }
                      wp_reset_postdata();
                  }
                ?>
        </ul>

    </div>


</aside>