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

<div class="sidebar bg-gray-100 p-4 rounded-lg shadow-lg sticky top-0 h-screen">
  <h3 class="font-bold text-xl mb-4"><?php echo $title;?></h3>
	<?php foreach ( $pages as $page ) :?>
  <ul class="block py-2 px-4 rounded-lg text-blue-500 hover:bg-blue-500 hover:text-white">
		<?php
			echo ($page['link']['title']);
		endforeach;

				?>
  </ul>
</div>