<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" />
    <?php wp_head(); ?>
</head>

<body class="bg-gray-100">


    <nav class="p-3 border-gray-300 bg-[#232428]">
        <div class="container flex flex-wrap items-center justify-between mx-auto">
            <a href="#" class="flex items-center">
                <span class="self-center text-lg text-[#F1F3F7] font-semibold whitespace-nowrap">ASK FOR HELP</span>
            </a>
            <button type="button"
                class="mobile-menu-button inline-flex items-center p-2 ml-3 text-sm text-white rounded-lg md:hidden  focus:outline-none focus:ring-2 focus:ring-gray-200  "
                aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg" x-show="!showMenu">
                    <path fill-rule="evenodd"
                        d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                        clip-rule="evenodd"></path>
                </svg>
            </button>
            <div class="hidden mobile-menu w-full md:block md:w-auto">


                <?php
        						wp_nav_menu(array(
									'theme_location' => 'primary',
                                    'menu_class'=>'flex flex-col mt-4 rounded-lg md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-transparent',
                                    'container' => false,
                                    'walker'=>new Walker_Nav_Primary()
									)
								);
							?>


            </div>
        </div>

    </nav>
    <script type="text/javascript">
    // Dropdown Menu
    const dropdownBtn = document.querySelector(".dropdown-menu");
    const div = document.querySelector(".doubleDropdown");

    dropdownBtn.addEventListener("click", () => {
        div.classList.toggle("hidden");
    });
    </script>