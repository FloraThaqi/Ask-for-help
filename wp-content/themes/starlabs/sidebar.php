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



<aside class="box-shadow bg-gray-900 h-inherit rounded-t-lg w-90 lg:gap-2 sticky top-0">
    <div class="flex justify-center w-full">
        <h1
            class="text-xl bg-gray-600 rounded-3xl px-4 font-serif font-semibold tracking-widest uppercase text-[#ffffff] my-4">
            <?php echo $title;?></h1>
    </div>
    <div class="my-2 bg-white h-[1px]"></div>
    <div class="flex flex-wrap bg-gray-900 lg:w-full pr-8 pl-3">
        <ul class="block">
            <?php foreach ( $pages as $page ) :?>
            <li class="hover:text-[#4767c9] text-white  font-serif  mb-2">
                <a href="<?php echo $page['link']['url'];?>"><?php echo $page['link']['title'];?></a>
                <?php
            endforeach;
                    ?>
            </li>
        </ul>
    </div>
</aside>