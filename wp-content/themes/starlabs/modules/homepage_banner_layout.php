<?php
        $left_text = $module['left_text'];
        $right_text = $module['right_text'];
        $paragraph = $module['paragraph'];
?>

<div class="min-h-screen max-w-full bg-right-bottom bg-cover bg-no-repeat text-white flex flex-wrap justify-center items-center"
        style="
        background-image: url(https://images01.nicepage.com/a1389d7bc73adea1e1c1fb7e/14932e39a84a5afe9272d0c1/pexels-photo-301930copy.jpg);
      ">
    <div class="h-full mt-20 flex lg:flex-row gap-20 justify-start lg:basis-[69%] flex-col p-[30px]">
      <div class="max-w-full flex flex-row justify-start items-center lg:flex-col flex-1">
        <h1 class="text-5xl font-bold"> 
          <?php echo $left_text;?>  
        </h1>
      </div>
      <div class="max-h-full relative flex flex-col justify-center lg:basis-[41%]">
        <div class="w-full flex flex-col text-left relative">
          <h3 class="text-2xl font-bold p-0 text-left">
            <?php echo $right_text;?></h3>
          <p class = "mt-5 mr-auto mb-0 ml-0">
            <?php echo $paragraph;?>
          </p>
        </div>
        <div
          class="h-auto block text-left bg-[#4767c9] rounded-3xl mt-6 relative text-base">
          <form
            action="#"
            class="p-[40px] -ml-2 mt-0 w-[calc(100%+10px)] flex flex-wrap items-end">
            <div class="w-full text-start">
              <label for="name" class="text-base"></label>
              <input
                type="text"
                class="bg-[#ffffff] text-[#111111] rounded-2xl block w-full mb-3 py-2.5 px-3 border-none text-start"
                placeholder="Enter your Name"/> 
            </div>
            <div class="w-full">
              <label for="email" class="text-start text-base"></label>
              <input
                type="email"
                class="bg-[#ffffff] text-[#111111] rounded-2xl block w-full mb-3 py-2.5 px-3 border-none text-start"
                placeholder="Enter a valid email address"/> 
            </div>
            <div class="w-full">
              <label for="message" class="text-start text-base"></label>
              <textarea class="bg-[#ffffff] text-[#111111] rounded-2xl block w-full mb-3 py-2.5 px-3 border-none text-start" rows="4" cols="50" placeholder="Enter your message"></textarea>
            </div>
            <div class="w-full mb-0">
              <a
                href="#"
                class="bg-[#e9edfa] text-[#111111] border-none border-transparent border-0 my-px relative rounded-2xl inline-block cursor-pointer text-center py-2.5 px-2.5 self-start"
              >
                <input
                  type="submit"
                  class="m-0 text-center py-px px-3 border-none border-2 cursor-pointer"
                /> 
              </a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> 