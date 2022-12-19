<?php
$tabs = $module['tabs'];
$tab_button = $module['tab_button'];
?>

<section class="my-8 bg-white" id="tabs-id">
    <div class="py-8">
        <div class="max-w-[1008px] mx-auto min-h-[208px]">
            <ul class="flex max-lg:w-full flex-wrap">
                <?php foreach ($tabs as $value) : ?>
                    <li class="max-lg:w-1/3"><a id="list-item" class="flex min-w-[128px] h-9 bg-white text-gray-600 justify-center items-center max-lg:w-full max-lg:min-w-0 cursor-pointer" onclick="changeActiveTab(event,'<?php echo $value['tab_name'] ?>')"><?php echo $value['tab_name']; ?></a></li>
                <?php endforeach; ?>
            </ul>
            <div class="p-6 py-4">
                <div class="tab-content">
                    <?php foreach ($tabs as $value) : ?>
                        <div id="<?php echo $value['tab_name'] ?>" class="hidden">
                            <p class="text-gray-600"><?php echo $value['tab_description']; ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="max-w-[1008px] mx-auto my-4">
            <?php foreach ($tab_button as $btnvalue) : ?>
                <div class="flex w-32 h-9 bg-[#4767c9] justify-center items-center mx-6">
                    <a href="<?php echo $btnvalue['button_link']; ?>" class="text-white uppercase text-xs"><?php echo $btnvalue['button_name']; ?></a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>