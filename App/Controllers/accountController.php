<?php

namespace App\Controllers;

use App\Helpers\AuthenticationHelper;
use App\Helpers\DatabaseHelper;
use App\Helpers\ValidationHelper;
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

    public static function forgot()
    {
        authenticationHelper::isGuest();
        return require __DIR__ . '../../../Resources/Views/Pages/authentication/forgot.php';
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
        unset($_SESSION['token']);
        unset($_SESSION['email']);
        session_commit();
        header("location: /");
        exit();
    }

    public static function sendlogin()
    {
        if (!empty($_POST)) {

            $email = $_POST['email'];
            $password = $_POST['password'];
            $userModel = new User();

            $authenticatedUser = $userModel->verifyCredentials($email, $password);

            if ($authenticatedUser == null) {
                unset($_SESSION['token']);
                unset($_SESSION['email']);

                header("location: /account/login?error=Username or password not found, please try again.");
                exit();
            }

            $_SESSION['token'] = AuthenticationHelper::generateToken($authenticatedUser); // AuthenticationHelper::validateToken($_SESSION['token'], $authenticatedUser)
            $_SESSION['email'] = $authenticatedUser->email;

            session_commit();
            header("location: /dashboard");
            exit();
        }
        header("location: /account/login?error=Something went wrong, try again.");
    }

    public static function sendregister()
    {
        // TODO: Validation

        if (!empty($_POST)) {

            $validator = new ValidationHelper($_POST);

            $validationRules = [
                ['field' => 'name', 'methods' => ['required', 'string'], 'message' => 'Name is required and must be a string.'],
                ['field' => 'email', 'methods' => ['required', 'email'], 'message' => 'Invalid email address.'],
                ['field' => 'age', 'methods' => ['required', 'integer'], 'message' => 'Age must be a number.'],
                ['field' => 'password', 'methods' => ['required'], 'message' => 'Password is required.'],
                ['field' => 'password_confirm', 'methods' => ['required', 'confirm:password'], 'message' => 'Password confirmation does not match.'],
                // Add more validation rules as needed
            ];

            $validator->validate($validationRules);

            if (!$validator->isValid()) {
                $errorMessages = implode(', ', $validator->getErrors());
                header("location: /account/register?error=" . urlencode($errorMessages));
                exit();
            }

            $user = new User();
            $pin = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $user->create([
                'type' => "Client",
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'gender' => $_POST['gender'],
                'age' => $_POST['age'],
                'pin' => $pin,
                'password' => $password,
            ]);

            header("location: /account/login?message=You can now login!");
            exit();
        }
        header("location: /account/register?error=Something went wrong, try again.");
    }

    public static function editAccount()
    {
        print_r($_REQUEST);

        $user = authenticationHelper::getUser();

        // $user->edit([
        //     'username' => $_REQUEST['username'],
        //     'email' => $_REQUEST['email'],
        //     'last_email' => $_REQUEST['last_email'],
        //     'email_threshold' => $_REQUEST['threshold'],
        // ]);

        // if ($_REQUEST['remember'] == 'on') {
        //     if ($_REQUEST['new_password'] == "" || $_REQUEST['new_password_confirm'] == "") {
        //         header("location: /account/settings?message=Password fields blank.");
        //     }

        //     if ($_REQUEST['new_password'] != $_REQUEST['new_password_confirm']) {
        //         header("location: /account/settings?message=Password fields do not match.");
        //     }

        //     $user->edit([
        //         'password' => $_REQUEST['new_password']
        //     ]);
        // }

        header("location: /account/settings?message=Changes saved");
    }

    public static function trainer_reset()
    {
        authenticationHelper::isAuth();
        $user = AuthenticationHelper::getUser();

        $user->edit($user->id, ['trainer_id' => NULL]);

        header("location: /my/pr");
        exit();
    }
}
