<?php

namespace App\Controllers;

use App\Helpers\AuthenticationHelper;
use App\Helpers\DatabaseHelper;
use App\Models\User;

/**
 * Deals with functions regarding a user's account.
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Controllers
 * @since      Class available since Release 1.0.0
 */
class accountController
{
    public static function login()
    {
        authenticationHelper::isGuest();
        return require __DIR__ . '../../../Resources/Views/Pages/authentication/login.php';
    }

    public static function register()
    {
        authenticationHelper::isGuest();
        return require __DIR__ . '../../../Resources/Views/Pages/authentication/register.php';
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
        if (!empty($_POST)) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = new User();

            $authenticatedUser = $userModel->verifyCredentials($email, $password);

            if ($authenticatedUser == null) {
                header("location: /account/login?error=Username or password not found, please try again.");
                exit();
            }

            $auth = new AuthenticationHelper();
            $_SESSION['token'] = $auth->generateToken($authenticatedUser); // $auth->validateToken($_SESSION['token'], $authenticatedUser)
            $_SESSION['email'] = $authenticatedUser->email;

            session_commit();
            header("location: /dashboard");
            exit();
        }
        header("location: /account/login?error=Something went wrong, try again.");
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

        if ($_REQUEST['remember'] == 'on') {
            if ($_REQUEST['new_password'] == "" || $_REQUEST['new_password_confirm'] == "") {
                header("location: /account/settings?message=Password fields blank.");
            }

            if ($_REQUEST['new_password'] != $_REQUEST['new_password_confirm']) {
                header("location: /account/settings?message=Password fields do not match.");
            }

            $user->edit([
                'password' => $_REQUEST['new_password']
            ]);
        }

        header("location: /account/settings?message=Changes saved");
    }
}
