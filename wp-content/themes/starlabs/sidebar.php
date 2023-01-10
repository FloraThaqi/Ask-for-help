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



<aside class="box-shadow shadow-lg bg-gray-200 h-inherit rounded-lg w-90 lg:gap-2 ml-6 sticky top-0">
      <h1 class="text-xl px-4 font-serif font-semibold tracking-widest uppercase text-gray-600 py-4"><?php echo $title;?></h1>
    <div class="bg-black h-[1px]"></div>
    <div class="flex flex-col rounded-lg bg-gray-200 lg:w-full ">
        <ul class="block"> 
        <?php foreach ( $pages as $page ) :?>
            <li class="hover:text-[#4767c9] text-gray-600 font-serif py-4 border-b border-gray-400">
                <a href="<?php echo $page['link']['url'];?>" class="px-4 "><?php echo $page['link']['title'];?></a> 
            <?php
            endforeach;
                    ?>
            </li>
        </ul>
    </div>
</aside>