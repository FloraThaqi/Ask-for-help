<?php
$tabs = $module['tabs'];
$tab_button = $module['tab_button'];
?>

<section class="my-8" id="tabs-id">
    <div class="max-w-[1008px] mx-auto bg-white">
        <ul class="flex max-lg:w-full flex-wrap">
            <?php foreach ($tabs as $value) : ?>
                <li class="max-lg:w-1/3"><a id="list-item" class="flex min-w-[128px] h-9 bg-white text-gray-600 justify-center items-center max-lg:w-full max-lg:min-w-0" onclick="changeActiveTab(event,'<?php echo $value['tab_name'] ?>')"><?php echo $value['tab_name']; ?></a></li>
            <?php endforeach; ?>
        </ul>
        <div class="p-6 py-4">
            <div class="tab-content">
                <?php foreach ($tabs as $value) : ?>
                    <div id="<?php echo $value['tab_name'] ?>" class="hidden">
                        <p class="text-gray-600"><?php echo $value['tab_description']; ?></p>
                        <div class="py-4 text-gray-600">
                            <p><a class="text-[#4767c9] font-black">✓ </a>ullamcorper eget nulla facilisi etiam</p>
                            <p><a class="text-[#4767c9] font-black">✓ </a>nisl suscipit adipiscing bibendum est ultricies</p>
                            <p><a class="text-[#4767c9] font-black">✓ </a>ullamcorper eget nulla facilisi etiam</p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php foreach ($tab_button as $btnvalue) : ?>
                <div class="flex w-32 h-9 py-2 bg-[#4767c9] justify-center items-center">
                    <a href="<?php echo $btnvalue['button_link']; ?>" class="text-white uppercase text-xs"><?php echo $btnvalue['button_name']; ?></a>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
</section>
<script type="text/javascript">
    window.addEventListener('load', showActiveName);
    window.addEventListener('load', showActiveDesc);

    //This function gets the ID of the first Tab Description Div and removes class 'hidden' from it
    function showActiveName() {
        let div = document.querySelector('.tab-content');
        let firstElement = div.firstElementChild;
        firstElement.classList.remove('hidden');
    }

    //This function adds text color and background color to the first Tab name which is active on load
    function showActiveDesc() {
        let element = document.getElementById('list-item');
        element.classList.add('bg-[#4767c9]');
        element.classList.add('text-white');
        element.classList.remove('text-gray-600');
        element.classList.remove('bg-white');
    }

    //This function changes the tab description based on which Tab Name we click
    function changeActiveTab(event, tabID) {
        let element = event.target;
        ulElement = element.parentNode.parentNode;
        aElements = ulElement.querySelectorAll("li > a");
        tabContents = document.getElementById("tabs-id").querySelectorAll(".tab-content > div");
        for (let i = 0; i < aElements.length; i++) {
            aElements[i].classList.remove("text-white");
            aElements[i].classList.remove("bg-[#4767c9]");
            aElements[i].classList.add("text-gray-600");
            aElements[i].classList.add("bg-white");
            tabContents[i].classList.add("hidden");
            tabContents[i].classList.remove("block");
        }
        element.classList.remove("text-gray-600");
        element.classList.remove("bg-white");
        element.classList.add("text-white");
        element.classList.add("bg-[#4767c9]");
        document.getElementById(tabID).classList.remove("hidden");
        document.getElementById(tabID).classList.add("block");
    }
</script>