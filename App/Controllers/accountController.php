<?php

namespace App\Controllers;

use App\Helpers\authenticationHelper;
use App\Helpers\dbHelper;

/**
 * Deals with functions regarding a user's account.
 *
 * @copyright  2023 2023 ModernFit-Group:4
 * @category   Controllers
 * @since      Class available since Release 1.0.0
 */ 
class accountController {

    
    public static function login()
    {
        authenticationHelper::isGuest();
        return require __DIR__ . '../../../views/login.php';
    }

    public static function settings()
    {
        authenticationHelper::isAuth(['account']);
        $user = authenticationHelper::getUser();
        return require __DIR__ . '../../../views/settings.php';
    }

    public static function logout()
    {
        session_start();
        unset($_SESSION['userId']);
        unset($_SESSION['userName']);
        unset($_SESSION['userType']);
        header("location: /");
    }


    public static function sendlogin()
    {
        if(isset($_POST['submit'])) {

            $username = $_POST['username'];
            $password = $_POST['password'];

            $database = new dbHelper();
            $users = $database->read('user', '*', "WHERE username = '" . $username."'", true);
            
            if($users == null) {
                header("location: /?error=Username not found, please try again.");
                exit();
            }        
            
            if ($password != $users["password"]) {
                header("location: /?error=Password does not match, please try again.");
                exit();
            }

            $_SESSION['userId'] = $users["id"];
            $_SESSION['userName'] = $username;
            
            if ($password == $users["password"]) {
                if($users["id"] == 2) {
                    $_SESSION['userType'] = 'staff';
                    session_commit();
                    header("location: /staff");
                    exit();
                }
            }
            
            if($users["id"] == 1) {
                $_SESSION['userType'] = 'manager';
                session_commit();
                header("location: /manager/boxes");
                exit();
            }
        }
        header("location: /?error=Something went wrong, try again.");
    }

    public static function editAccount()
    {
        print_r($_REQUEST);

        $user = authenticationHelper::getUser();

        $user->edit([
            'username' => $_REQUEST['username'],
            'email' => $_REQUEST['email'],
            'last_email' => $_REQUEST['last_email'],
            'email_threshold' => $_REQUEST['threshold'],
        ]);

        if($_REQUEST['remember'] == 'on')
        {
            if($_REQUEST['new_password'] == "" || $_REQUEST['new_password_confirm'] == "")
            {
                header("location: /account/settings?message=Password fields blank.");
            }

            if($_REQUEST['new_password'] != $_REQUEST['new_password_confirm'])
            {
                header("location: /account/settings?message=Password fields do not match.");
            }

            $user->edit([
                'password' => $_REQUEST['new_password']
            ]);
        }

        header("location: /account/settings?message=Changes saved");
    }
        
}