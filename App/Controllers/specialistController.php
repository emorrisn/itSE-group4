<?php

namespace App\Controllers;

use App\Helpers\AuthenticationHelper;
use App\Helpers\DatabaseHelper;
use App\Models\User;
use App\Models\Workout;

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

    public static function table()
    {
        authenticationHelper::isAuth();

        $tables = [
            'user',
            'exercise',
            'meal',
            'diet',
            'workout'
        ];

        if (!isset($_GET['table'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (!in_array($_GET['table'], $tables)) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

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


        return require __DIR__ . '../../../Resources/Views/Pages/Specialist/table.php';
    }

    public static function item()
    {
        authenticationHelper::isAuth();

        if (!isset($_GET['table'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $tableName = $_GET['table'];
            $fullClassName = "App\\Models\\" . $tableName;
            $table = new $fullClassName();
            $result = $table->query->from($table->table)->where('id', '=', $_GET['item'])->get();
        }

        return require __DIR__ . '../../../Resources/Views/Pages/Specialist/item.php';
    }

    public static function link()
    {
        authenticationHelper::isAuth();

        // ?table=client&to=workout&item=1

        if (!isset($_GET['table'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (!isset($_GET['to'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $tableName = $_GET['table'];
        $linkTableName = $_GET['to'];

        $fullClassName = "App\\Models\\" . $tableName;
        $linkfullClassName = "App\\Models\\" . $linkTableName;

        $table = new $fullClassName();
        $linktable = new $linkfullClassName();

        // Get result of table that will be linked
        $result = $table->query->from($table->table)->where('id', '=', $_GET['item'])->get();

        // Get results of table items to be linked
        $findResults = $linktable->query->from($linktable->table);
        $results = [];

        if (isset($_GET['search'])) {

            foreach ($linktable->fillable as $fillable) {
                $findResults = $findResults->orWhere($fillable, 'LIKE', '%' . $_GET['search'] . '%');
            }
            $findResults = $findResults->get(false);
        } else {
            $findResults = $findResults->get(false);
        }

        foreach ($findResults as $r) {
            $linktable = new $linkfullClassName();
            $linktable->fill($r);
            $results[] = $linktable;
        }


        return require __DIR__ . '../../../Resources/Views/Pages/Specialist/link.php';
    }

    public static function item_link()
    {
        if (!isset($_GET['table'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (!isset($_GET['to'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (!isset($_GET['item'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $linkTableName = $_GET['table'] . ucfirst($_GET['to']);
        $fullClassName = "App\\Models\\" . $linkTableName;

        $table = $_GET['table'];
        $link = $_GET['to'];
        $item = $_GET['item'];
        $unlink = $_GET['type'] == 'link' ? false : true;

        $itemToLink = new ("App\\Models\\" . ucfirst($link))();
        $linkTable = new $fullClassName();

        $itemToLink->fill($itemToLink->query->from($itemToLink->table)->where('id', '=', $item)->get());


        print_r($linkTable);
        die();


        // >> IF: unlink then just remove the item from the table
        // >> OR: link then: 
        // pass over the item with the details that need filling-in to the view
        // view will have a form which 

        return require __DIR__ . '../../../Resources/Views/Pages/Specialist/link-create.php';
    }
}
