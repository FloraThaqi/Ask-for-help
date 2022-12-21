<?php 
	
/*
	Template Name: Right Sidebar Page
*/
	
get_header(); ?>

<div class="w-full px-4 flex flex-row">
	<div class="w-full min-h-screen">
		<?php if(have_posts()):
			while(have_posts()): the_post();?>
				<h1><?php the_title();?></h1>
				<p><?php the_content();?></p>
			<?php endwhile;
		endif;
		?>
	</div>

	<div class="w-[270px]">
		<h1>This is where the sidebar goes</h1>
		<?php get_sidebar();?>
	</div>
</div>

<?php get_sidebar(); ?>
<?php get_footer(); ?>