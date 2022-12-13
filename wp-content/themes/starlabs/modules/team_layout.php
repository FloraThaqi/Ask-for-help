<?php 
/* 
    Template Name:The Team
*/
get_header();
?>
<?php 
    $array = array("Sara", "Ardi", "Denisa","Abedin");
?>

<section class="bg-slate-100">

    <h1 class="text-center font-bold text-black text-3xl p-10"> Meet The Team</h1>

    <div class="flex flex-wrap justify-center ">

        <?php foreach($array as $name):?>
        <div class="w-full max-w-md bg-white  border-none rounded-3xl  dark:bg-gray-800 dark:border-gray-700 m-5 p-5">
            <div class="flex flex-col space-y-4 md:space-y-0 md:space-x-6 md:flex-row ">
                <img src="https://mdbootstrap.com//img/Photos/Square/1.jpg" alt=""
                    class="self-center flex-shrink-0 w-32 h-32 border rounded-full md:justify-self-start dark:bg-gray-500 dark:border-gray-700">
                <div class="flex flex-col">
                    <span class="text-slate-300 font-semibold text-center md:text-left">Developer</span>
                    <h4 class="text-lg font-bold text-center md:text-left text-[#6883D2]"><?php  echo $name?></h4>
                    <p class="text-slate-400 text-sm">Lorem Ipsum is simply dummy text of the printing and
                        typesetting
                        industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
                </div>
            </div>
            <div class="flex justify-center pt-4 space-x-4 align-center">

                <a rel="noopener noreferrer" href="#" aria-label="Dribble" class="p-1 rounded-full bg-[#6883D2] ">
                    <svg class="h-6 w-6 text-white" width="6" height="6" viewBox="0 0 24 24" stroke-width="1"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                    </svg>
                </a>
                <a rel="noopener noreferrer" href="#" aria-label="Twitter" class="p-1 rounded-full bg-[#6883D2] ">
                    <svg class="h-6 w-6 text-white " viewBox="0 0 24 24" fill="white" stroke="currentColor"
                        stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" />
                    </svg>
                </a>
                <a rel="noopener noreferrer" href="#" aria-label="Email" class="p-1 rounded-full bg-[#6883D2]">
                    <svg class="h-6 w-6 text-white" width="4" height="4" viewBox="0 0 24 24" stroke-width="1"
                        stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <rect x="4" y="4" width="16" height="16" rx="4" />
                        <circle cx="12" cy="12" r="3" />
                        <line x1="16.5" y1="7.5" x2="16.5" y2="7.501" />
                    </svg>
                </a>
            </div>
        </div>
        <?php endforeach ; ?>
    </div>
</section>

<?php get_footer(); ?>