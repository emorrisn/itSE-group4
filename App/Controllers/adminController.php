<?php

namespace App\Controllers;

use App\Helpers\AuthenticationHelper;
use App\Helpers\DatabaseHelper;
use App\Models\User;
use App\Models\Food;
use App\Models\Exercise;
use App\Models\Meal;
use App\Models\MealLog;
use App\Models\ExerciseLog;
use App\Models\Notification;
use App\Models\WorkoutExercise;
use App\Models\Workout;
use App\Models\UserWorkout;
use App\Models\UserDiet;

/**
 * Deals with functions regarding dashboard
 *
 * @copyright  2023 ModernFit-Group:4
 * @category   Controllers
 * @since      Class available since Release 1.0.0
 */
class adminController
{
    public static function dashboard()
    {
        authenticationHelper::isAuth();

        if (AuthenticationHelper::isRole('admin')  == false) {
            header('Location: /404');
            exit;
        }

        $databaseHelper = new \App\Helpers\DatabaseHelper();
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $tables = $databaseHelper->getAllTables();

        if (!empty($search)) {
            $filteredTables = [];
            foreach ($tables as $tableName) {
                if (strpos($tableName, strtolower($search)) !== false) {
                    $filteredTables[] = $tableName;
                }
            }
            $tables = $filteredTables;
        }

        return require __DIR__ . '../../../Resources/Views/Pages/Admin/dashboard.php';
    }

    public static function table()
    {
        authenticationHelper::isAuth();

        if (AuthenticationHelper::isRole('admin')  == false) {
            header('Location: /404');
            exit;
        }

        if (!isset($_GET['table'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $tableName = $_GET['table'];

            $fullClassName = "App\\Models\\" . $tableName;
            $table = new $fullClassName();
            $results = $table->query->from($table->table);


            if (isset($_GET['search'])) {

                foreach ($table->fillable as $fillable) {
                    $results = $results->orWhere($fillable, 'LIKE', '%' . $_GET['search'] . '%');
                }
                $results = $results->get(false);
            } else {
                $results = $results->get(false);
            }
        }


        return require __DIR__ . '../../../Resources/Views/Pages/Admin/table.php';
    }

    public static function item()
    {
        authenticationHelper::isAuth();

        if (AuthenticationHelper::isRole('admin')  == false) {
            header('Location: /404');
            exit;
        }

        if (!isset($_GET['table'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $tableName = $_GET['table'];
            $fullClassName = "App\\Models\\" . $tableName;
            $table = new $fullClassName();
            $result = $table->query->from($table->table)->where('id', '=', $_GET['item'])->get();
        }

        return require __DIR__ . '../../../Resources/Views/Pages/Admin/item.php';
    }

    public static function item_edit()
    {
        authenticationHelper::isAuth();

        if (AuthenticationHelper::isRole('admin')  == false) {
            header('Location: /404');
            exit;
        }

        $tableName = $_GET['table'];
        $fullClassName = "App\\Models\\" . $tableName;
        $table = new $fullClassName();

        header("location: /admin/item?table=" . $tableName . "&item=" . $_GET['item'] . "&message=Saved");
        exit();
    }
}
