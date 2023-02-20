<!DOCTYPE html>
<html>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="stylesheet" href="<?php echo esc_url(get_stylesheet_uri()); ?>" type="text/css" />
    <?php wp_head(); ?>
</head>


<body class="bg-gray-100 dark:bg-[#181f2a] font-display ">


    <nav class="bg-white dark:bg-[#0b1523] shadow-lg w-full fixed z-50 h-16 ">
        <div class=" md:container flex flex-wrap items-center justify-between mx-auto">
            <!-- Logo  -->
            <a href="<?php echo home_url(); ?>" class="w-40 flex items-center pl-4">
                <?php
                $header_logo = get_field('header_logo', 'option');

                if (!empty($header_logo)) : ?>
                    <img class="object-contain h-16 " src="<?php echo esc_url($header_logo['url']); ?>" alt="<?php echo esc_attr($header_logo['alt']); ?>" />
                <?php endif; ?>
            </a>

            <div class="flex">
                <!-- Dark Mode button -->
                <div class="dark-mode-button w-8 h-8 bg-gray-100 rounded-lg shadow-[inset_0_3px_6px_0_rgb(0,0,0,0.2)] my-auto">
                    <button name="dark-mode-button" id="dark-mode" class="w-6 h-6 bg-[#4767c9] rounded-md mx-1 my-1 text-[#4767c9]">
                        <svg class="w-4 h-4 fill-white mx-1 dark:hidden" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M361.5 1.2c5 2.1 8.6 6.6 9.6 11.9L391 121l107.9 19.8c5.3 1 9.8 4.6 11.9 9.6s1.5 10.7-1.6 15.2L446.9 256l62.3 90.3c3.1 4.5 3.7 10.2 1.6 15.2s-6.6 8.6-11.9 9.6L391 391 371.1 498.9c-1 5.3-4.6 9.8-9.6 11.9s-10.7 1.5-15.2-1.6L256 446.9l-90.3 62.3c-4.5 3.1-10.2 3.7-15.2 1.6s-8.6-6.6-9.6-11.9L121 391 13.1 371.1c-5.3-1-9.8-4.6-11.9-9.6s-1.5-10.7 1.6-15.2L65.1 256 2.8 165.7c-3.1-4.5-3.7-10.2-1.6-15.2s6.6-8.6 11.9-9.6L121 121 140.9 13.1c1-5.3 4.6-9.8 9.6-11.9s10.7-1.5 15.2 1.6L256 65.1 346.3 2.8c4.5-3.1 10.2-3.7 15.2-1.6zM160 256a96 96 0 1 1 192 0 96 96 0 1 1 -192 0zm224 0a128 128 0 1 0 -256 0 128 128 0 1 0 256 0z" />
                        </svg>
                        <svg class="w-4 h-4 fill-white mx-1 hidden dark:block" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512"><!--! Font Awesome Pro 6.3.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. -->
                            <path d="M223.5 32C100 32 0 132.3 0 256S100 480 223.5 480c60.6 0 115.5-24.2 155.8-63.4c5-4.9 6.3-12.5 3.1-18.7s-10.1-9.7-17-8.5c-9.8 1.7-19.8 2.6-30.1 2.6c-96.9 0-175.5-78.8-175.5-176c0-65.8 36-123.1 89.3-153.3c6.1-3.5 9.2-10.5 7.7-17.3s-7.3-11.9-14.3-12.5c-6.3-.5-12.6-.8-19-.8z" />
                        </svg>
                    </button>
                </div>

                <!-- Burger Menu -->
                <button type="button" class="mobile-menu-button inline-flex items-center mr-4 rounded-lg md:hidden  focus:outline-none focus:ring-2 focus:ring-gray-200  " aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-8 h-8 dark:fill-white" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" x-show="!showMenu">
                        <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                    </svg>
                </button>

                <div class="flex">
                    <!-- Navbar  -->
                    <div class="md:flex flex-row-reverse items-center hidden mobile-menu w-full text-black dark:text-white md:w-auto" id="navbar-text">

                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'primary',
                                'menu_class' => 'flex flex-col  rounded-lg md:flex-row md:space-x-4 md:text-sm md:font-medium md:border-0 md:bg-transparent',
                                'container' => false,
                                'walker' => new Walker_Nav_Primary()
                            )
                        );
                        ?>

                    </div>
                </div>
            </div>
        </div>
        <!-- search bar -->
        <div class="search-box  rounded-sm absolute hidden  right-5 p-2  mx-auto text-gray-600 ">
            <form role="search" method="get" class="search-form" action="<?php echo home_url('/'); ?>">
                <input type="search" class="search-field border-2 border-gray-300 bg-white h-10 px-5 pr-16 rounded-lg text-sm focus:outline-none" placeholder="<?php echo esc_attr_x('Search', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
                <button type="submit" class="search-submit text-white cursor-pointer absolute right-0 top-0 mt-5 mr-4" value="<?php echo esc_attr_x('Search', 'submit button') ?>">
                    <svg class="text-gray-600 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" id="Capa_1" x="0px" y="0px" viewBox="0 0 56.966 56.966" style="enable-background:new 0 0 56.966 56.966;" xml:space="preserve" width="512px" height="512px">
                        <path d="M55.146,51.887L41.588,37.786c3.486-4.144,5.396-9.358,5.396-14.786c0-12.682-10.318-23-23-23s-23,10.318-23,23  s10.318,23,23,23c4.761,0,9.298-1.436,13.177-4.162l13.661,14.208c0.571,0.593,1.339,0.92,2.162,0.92  c0.779,0,1.518-0.297,2.079-0.837C56.255,54.982,56.293,53.08,55.146,51.887z M23.984,6c9.374,0,17,7.626,17,17s-7.626,17-17,17  s-17-7.626-17-17S14.61,6,23.984,6z" />
                    </svg>
                </button>
            </form>
        </div>
    </nav>