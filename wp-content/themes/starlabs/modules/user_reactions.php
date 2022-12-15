<?php
$array = array("Ardi Alickaj", "Rinor Gerxhaliu");
?>
<section>
    <h2 class="text-center text-5xl font-bold mb-8">Read what our customers say</h2>
    <div class="w-[1140px] m-auto mt-16 max-lg:w-11/12">
        <div class="w-[1008px] m-auto max-lg:w-11/12">
            <div class="grid grid-cols-2 gap-8 max-lg:grid-cols-1">
                <?php foreach ($array as $name) : ?>
                    <div class="bg-white w-full px-16 pt-12 pb-10 rounded-3xl max-lg:p-4">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" class="fill-blue-600 w-10 h-10 mb-4">
                            <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                            <path d="M0 216C0 149.7 53.7 96 120 96h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H64c-35.3 0-64-28.7-64-64V320 288 216zm256 0c0-66.3 53.7-120 120-120h8c17.7 0 32 14.3 32 32s-14.3 32-32 32h-8c-30.9 0-56 25.1-56 56v8h64c35.3 0 64 28.7 64 64v64c0 35.3-28.7 64-64 64H320c-35.3 0-64-28.7-64-64V320 288 216z" />
                        </svg>
                        <p class="text-gray-400 pb-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Morbi tristique senectus et netus et malesuada fames ac turpis. Molestie ac feugiat sed lectus vestibulum mattis.</p>
                        <div class="flex max-lg:flex-col">
                            <img src="" alt="profile" width="60px" height="60px">
                            <div class="pl-6 max-lg:pl-0">
                                <p class="font-bold"><?php echo $name ?></p>
                                <p class="text-gray-400">Full-Stack Intern</p>
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
        </div>
        <div class="flex justify-center my-16">
            <div class="flex justify-self-center justify-center w-72 h-16 bg-blue-600 rounded-full items-center">
                <a class=" text-white text-2xl font-bold">Get Started</a>
            </div>
        </div>
    </div>
</section>