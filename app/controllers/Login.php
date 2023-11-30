<?php

use app\core\Controller;
use app\core\Navigation;

class Login extends Controller
{

    /*
    * Calls the view index.php from /home or just /
    */
    public function index()
    {
        $failedLogin = false;
        // Check if the form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // In a real-world scenario, you would perform secure user authentication here
            // For demonstration purposes, let's check if a username and password are provided
            if (!empty($_POST["username"]) && !empty($_POST["password"])) {
                // Assuming the login is successful, set a session variable
                // In a real-world scenario, you would perform proper authentication and validation
                $_SESSION["user_id"] = 1; // Set some user identifier
                Navigation::redirect("/user"); // Redirect to the home page
                exit();
            } else {
                $failedLogin = true;
            }
        }

        $this->view('login/index', ['failed_login' => $failedLogin]);
    }

}
