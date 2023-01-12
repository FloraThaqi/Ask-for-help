<?php
$tabs = $module['tabs'];
?>

<section class="my-8 bg-white" id="tabs-id">
    <div class="max-w-[1008px] mx-auto py-12 min-h-[272px]">
        <ul class="flex max-lg:w-full flex-wrap">
            <?php foreach ($tabs as $value) : ?>
                <li class="max-lg:w-1/3"><a id="list-item" class="flex min-w-[128px] h-9 bg-white text-gray-600 justify-center items-center max-lg:w-full max-lg:min-w-0 cursor-pointer" onclick="changeActiveTab(event,'<?php echo $value['tab_name'] ?>')"><?php echo $value['tab_name']; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="px-6 pt-4">
            <div class="tab-content">
                <?php foreach ($tabs as $value) : ?>
                    <div id="<?php echo $value['tab_name'] ?>" class="hidden">
                        <p class="text-gray-600"><?php echo $value['tab_description']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
<script>
    window.addEventListener("load", showActiveName);
    window.addEventListener("load", showActiveDesc);

    //This function gets the ID of the first Tab Description Div and removes class 'hidden' from it
    function showActiveName() {
        let div = document.querySelector(".tab-content");
        let firstElement = div.firstElementChild;
        firstElement.classList.remove("hidden");
    }

    //This function adds text color and background color to the first Tab name which is active on load
    function showActiveDesc() {
        let element = document.getElementById("list-item");
        element.classList.add("bg-[#4767c9]");
        element.classList.add("text-white");
        element.classList.remove("text-gray-600");
        element.classList.remove("bg-white");
    }
</script>