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
class specialistController
{
    public static function dashboard()
    {
        authenticationHelper::isAuth();
        return require __DIR__ . '../../../Resources/Views/Pages/Specialist/dashboard.php';
    }
}
