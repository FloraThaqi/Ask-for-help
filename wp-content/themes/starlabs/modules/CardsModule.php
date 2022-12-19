<?php 
$cards = $module['cards'];
$cards_title = $module['cards_title'];

?>
<div class="mt-20">
      <h1 class="mt-8 mx-auto max-w-md text-4xl font-bold text-center">
      <?php echo $cards_title; ?>
      </h1>

      <div
        class="container mx-auto grid sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-10 mb-14"
      > <?php foreach ($cards as $card) : ?>
        <div class="bg-white rounded-md p-5 shadow-lg">
          <div class="space-y-2">
            <img src="<?php echo $card['card_image']['url']; ?>" class="w-16 h-16" />
            <h2 class="font-semibold"><?php echo $card['card_name']; ?></h2>
          </div>
          <div class="pt-5 text-gray-400">
            <p><?php echo $card['card_description']; ?></p>
          </div>
        </div>
        <?php endforeach; ?>
        <div class="bg-white rounded-md p-5 shadow-lg">
          <div class="space-y-2">
            <img src="<?php echo esc_url( get_template_directory_uri() . '/public/images/icon2.png' ); ?>" class="w-16 h-16" />
            <h2 class="font-semibold">Idea Generation</h2>
          </div>
          <div class="pt-5 text-gray-400">
            <p>Become a category leader using designops and UX/UI design</p>
          </div>
        </div>

      </div>
    </div>
