<?php 
/* 
    Template Name:The Team
*/
get_header();
?>

<?php 
    $team = $module['team'];
    $default_pic="https://rugby.vlaanderen/wp-content/uploads/2018/03/Anonymous-Profile-pic.jpg";
    ?>

<section class="bg-[#F2F2F2]">

    <h1 class="text-center font-bold text-black text-3xl p-10"> Meet The Team</h1>
    <div class="row">

        <div class=" flex flex-wrap justify-center ">

            <?php foreach($team as $value):?>
            <div class="container w-full max-w-md bg-white  border-none rounded-3xl m-5 p-5">
                <div class="flex flex-col space-y-5 md:space-y-0 md:space-x-6 md:flex-row ">
                    <?php if($value['image']): ?>
                    <img src="<?php echo $value['image']['url']; ?>" alt=""
                        class="self-center flex-shrink-0 w-40 h-40 border rounded-full md:justify-self-start">
                    <?php else:?>
                    <img src="<?php  echo $default_pic ?>" alt=""
                        class="self-center flex-shrink-0 w-40 h-40 border rounded-full md:justify-self-start">
                    <?php endif;?>
                    <div class="flex flex-col space-y-2 ">
                        <span
                            class="text-slate-300 font-semibold text-center md:text-left"><?php  echo $value['job_role'];?>
                        </span>
                        <h4 class="text-lg font-bold text-center md:text-left text-[#4767C9]">
                            <?php  echo $value['name'];?>
                        </h4>
                        <p class="text-slate-400 text-sm"><?php echo $value['description'];?></p>
                    </div>
                </div>
                <div class="flex justify-center pt-4  align-center">

                    <a rel="noopener noreferrer" href="<?php echo $value['facebook_url']['url'] ?>"
                        target=<?php echo $value['facebook_url']['target'] ?> aria-label="Dribble"
                        class="p-1 rounded-full bg-[#4767C9] ">
                        <svg class="h-6 w-6 text-white" width="6" height="6" viewBox="0 0 24 24" stroke-width="1"
                            stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" />
                            <path d="M7 10v4h3v7h4v-7h3l1 -4h-4v-2a1 1 0 0 1 1 -1h3v-4h-3a5 5 0 0 0 -5 5v2h-3" />
                        </svg>
                    </a>
                    <a rel="noopener noreferrer" href="<?php echo $value['twitter_url']['url'] ?>"
                        target=<?php echo $value['twitter_url']['target'] ?> aria-label="Twitter"
                        class="p-1 rounded-full bg-[#4767C9] ">
                        <svg class="h-6 w-6 text-white " viewBox="0 0 24 24" fill="white" stroke="currentColor"
                            stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                            <path
                                d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z" />
                        </svg>
                    </a>
                    <a rel="noopener noreferrer" href="<?php echo $value['instagram_url']['url'] ?>"
                        target=<?php echo $value['instagram_url']['target'] ?> aria-label="Email"
                        class="p-1 rounded-full bg-[#4767C9]">
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
    </div>



</section>