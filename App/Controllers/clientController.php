<?php

namespace App\Controllers;

use App\Helpers\AuthenticationHelper;
use App\Helpers\DatabaseHelper;
use App\Models\User;

/**
 * Deals with functions regarding dashboard
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Controllers
 * @since      Class available since Release 1.0.0
 */
class clientController
{
    public static function dashboard()
    {
        authenticationHelper::isAuth();
        return require __DIR__ . '../../../Resources/Views/Pages/client/dashboard.php';
    }

    public static function pin()
    {
        authenticationHelper::isAuth();
        return require __DIR__ . '../../../Resources/Views/Pages/client/pin.php';
    }

    public static function pin_reset()
    {
        authenticationHelper::isAuth();
        $user = AuthenticationHelper::getUser();
        $pin = str_pad(mt_rand(0, 9999), 4, '0', STR_PAD_LEFT);

        $user->edit($user->id, ['pin' => $pin]);

        header("location: /my/pin");
        exit();
    }

    public static function personalTrainer()
    {
        authenticationHelper::isAuth();
        return require __DIR__ . '../../../Resources/Views/Pages/client/personalTrainer.php';
    }
}
