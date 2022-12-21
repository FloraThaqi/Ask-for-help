<?php 
	
/*
	Template Name: Right Sidebar Page
*/
	
get_header(); ?>

<div class="w-full">
  <div class="p-4 flex flex-col md:flex-row">
    <div class="w-full">
      <?php if(have_posts()):
        while(have_posts()): the_post();?>
          <h1><?php the_title();?></h1>
          <p><?php the_content();?></p>
        <?php endwhile;
      endif;
      ?>
    </div>

    <div class="w-full md:w-[30%]">
      <h1>This is where the sidebar goes</h1>
      <?php get_sidebar();?>
    </div>
  </div>
</div>

<?php get_footer(); ?>