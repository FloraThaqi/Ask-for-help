<div class="bg-indigo-500" >
<?php
    $title = $module['title'];
    $sub_title = $module['sub_title'];
    $offer = $module['offer'];
    $description = $module['description'];
    $button = $module['button'];
    $copyright = $module['copyright'];
    $terms = $module['terms'];
    $privacy_policy = $module['privacy_policy'];
    
?>
<div class="bg-indigo-500" >
    <div class="py-14">
        <h5 class=" leading-3 space-y-1.5 font-semibold flex justify-center text-lg	 text-white"><?php echo $title ?></h5><br>
        <h2 class=" flex justify-center text-white text-[30px]"><?php echo $sub_title ?></h2>
        <h1 class=" font-bold  flex justify-center text-white text-[70px]"><?php echo $offer ?></h1>
            <p class="tracking-tight text-white flex justify-center px-6 text-center"><?php echo $description ?></p>
        <div class=" my-10 text-white flex justify-center">
        <?php if($button): ?>
        <a href="<?php echo $button['url'] ?>" target="_blank" class="self-center font-bold bg-white rounded-full hover:bg-sky-700"><h3 class="px-20 py-4 text-lg font-bold text-slate-500"><?php echo $button['title']?></h3></a>
        <?php endif ?>        </div>
        <div class="text-[14px] text-white flex justify-center">
    <?php 
        if( $copyright ): ?>
    <p class="text-white flex justify-center"><?php echo $copyright ?>  
        <?php endif;?>

        <?php 
        if( $terms ): ?>    
    <a class="underline underline-offset-1"> <?php echo $terms ?> </a>
    <?php endif; ?>

    
    <?php 
        if( $privacy_policy ): ?> 
     <a class="ml-1 underline underline-offset-1">  <?php echo $privacy_policy ?></a></p>
     <?php endif; ?>
    </div>
         </div>
    </div>
</div>