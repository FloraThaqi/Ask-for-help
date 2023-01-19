<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package StarLabs
 */

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
<h2 class="text-base px-4 font-semibold tracking-widest uppercase text-gray-600 py-4">Categories</h2>
  <ul class="text-sm font-medium">
    <?php wp_get_archives( array(
      'type' => 'postbypost',
      'limit' => 10,
      'before' => '<li class="hover:text-[#4767c9] mx-5 text-black py-4 border-b border-slate-300 last:border-none">',
      'after' => '</li>'
    ) ); ?>
  </ul>
</aside>

