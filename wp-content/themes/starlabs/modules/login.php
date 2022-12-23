<?php  
/* 
Template Name: Login 
*/  

get_header();   
global $wpdb, $user_ID;  
if ($user_ID) {  
}else
{  
    $errors = array();  

    if( $_SERVER['REQUEST_METHOD'] == 'POST' ) 
      {  

        // Check username is present and not already in use  
        $username = $wpdb->escape($_REQUEST['username']);  
        if ( strpos($username, ' ') !== false )
        {   
            $errors['username'] = "Sorry, no spaces allowed in usernames";  
        }  
        if(empty($username)) 
        {   
            $errors['username'] = "Please enter a username";  
        } elseif( username_exists( $username ) ) 
        {  
            $errors['username'] = "Username already exists, please try another";  
        }  
        // Check password is valid  
        if(0 === preg_match("/.{6,}/", $_POST['password']))
        {  
          $errors['password'] = "Password must be at least six characters";  
        }  

        if(0 === count($errors)) 
         {  

            $password = $_POST['password'];  

            $new_user_id = wp_create_user( $username, $password);  

            $success = 1;  

        }  

    }  
}  

?>


<!-- Login -->
<div class="bg-gray-200er min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2 m-5">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black">
            <h1 class="mb-8 text-3xl text-center">Log in</h1>
            <form class="space-y-4 md:space-y-6" id="wp_signup_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>"
                method="post">
                <div>

                    <input type="text" class="block border border-gray-300 w-full p-3 rounded mb-4" name="username"
                        placeholder="Username" />

                </div>
                <input type="password" class="block border border-gray-300 w-full p-3 rounded mb-4" name="password"
                    placeholder="Password" />
                    <input type="checkbox" value="lsRememberMe" id="rememberMe"> <label for="rememberMe">Remember me</label>
                    <div class="justify-center text-center p-4 ">
                        <button type="submit" id="submitbtn" name="submit"
                            class="p-2 my-4 py-3 rounded-full bg-[#4767C9] text-white hover:bg-[#4767E9] focus:outline-none my-1">Login
                        </button>
                    </div>
                    

                <div class="text-center text-sm text-gray-700 mt-4">
                By log in, you agree to the
                    <a class="no-underline border-b border-gray-700 text-gray-700" href="#">
                        Terms of Service
                    </a> and
                    <a class="no-underline border-b border-gray-700 text-gray-700" href="#">
                        Privacy Policy
                    </a>
                </div>
        </div>
        </form>
        <div class="text-gray-700 m-5">
            Not registered yet? 
            <a class="no-underline border-b border-blue-900 text-blue-900 " href="#">
            Create an Account
            </a>.
        </div>

    </div>
</div>

<?php get_footer(); ?>