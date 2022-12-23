<?php  
/* 
Template Name: Register 
*/  
   
get_header();   
global $wpdb, $user_ID;  
//Check whether the user is already logged in  
if ($user_ID) 
{  
   
    // They're already logged in, so we bounce them back to the homepage.  
   
    // wp_redirect(home_url()); exit;
   
} else
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
   
        // Check email address is present and valid  
        $email = $wpdb->escape($_REQUEST['email']);  
        if( !is_email( $email ) ) 
        {   
            $errors['email'] = "Please enter a valid email";  
        } elseif( email_exists( $email ) ) 
        {  
            $errors['email'] = "This email address is already in use";  
        }  
   
        // Check password is valid  
        if(0 === preg_match("/.{6,}/", $_POST['password']))
        {  
          $errors['password'] = "Password must be at least six characters";  
        }  
   
        // Check password password_confirmation  
        if(0 !== strcmp($_POST['password'], $_POST['password_confirmation']))
         {  
          $errors['password_confirmation'] = "Passwords do not match";  
        }  

   
        if(0 === count($errors)) 
         {  
   
            $password = $_POST['password'];  
   
            $new_user_id = wp_create_user( $username, $password, $email );  
   
            // You could do all manner of other things here like send an email to the user, etc. I leave that to you.  
   
            $success = 1;  
   
            //header( 'Location:' . get_bloginfo('url') . '/login/?success=1&u=' . $username );  
   
        }  
   
    }  
}  
  
?>


<!-- Register -->
<div class="bg-gray-200er min-h-screen flex flex-col">
    <div class="container max-w-sm mx-auto flex-1 flex flex-col items-center justify-center px-2 m-5">
        <div class="bg-white px-6 py-8 rounded shadow-md text-black w-full">
            <h1 class="mb-8 text-3xl text-center">Sign up</h1>
            <form class="space-y-4 md:space-y-6" id="wp_signup_form" action="<?php echo $_SERVER['REQUEST_URI']; ?>"
                method="post">
                <div>

                    <input type="text" class="block border border-gray-300 w-full p-3 rounded mb-4" name="username"
                        placeholder="Username" />

                </div>
                <input type="text" class="block border border-gray-300 w-full p-3 rounded mb-4" name="email"
                    placeholder="Email" />

                <input type="password" class="block border border-gray-300 w-full p-3 rounded mb-4" name="password"
                    placeholder="Password" />
                <input type="password" class="block border border-gray-300 w-full p-3 rounded mb-4"
                    name="password_confirmation" placeholder="Confirm Password" />

                <button type="submit" id="submitbtn" name="submit"
                    class="w-full text-center py-3 rounded bg-[#4767C9] text-white hover:bg-[#4767E9] focus:outline-none my-1">Create
                    Account</button>

                <div class="text-center text-sm text-gray-700 mt-4">
                    By signing up, you agree to the
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
            Already have an account?
            <a class="no-underline border-b border-blue-900 text-blue-900" href="#">
                Log in
            </a>.
        </div>

    </div>
</div>

<?php get_footer(); ?>