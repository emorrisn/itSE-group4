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
    private static function verify()
    {
        authenticationHelper::isAuth();

        if (AuthenticationHelper::isRole('specialist')  == false && AuthenticationHelper::isRole('admin') == false) {
            header('Location: /404');
            exit;
        }
    }

    public static function dashboard()
    {
        specialistController::verify();

        return require __DIR__ . '../../../Resources/Views/Pages/Specialist/dashboard.php';
    }

    public static function table()
    {
        specialistController::verify();

        $tables = [
            'user',
            'exercise',
            'meal',
            'diet',
            'workout',
            'food',
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

    public static function add()
    {
        specialistController::verify();

        if (!isset($_GET['table'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        } else {
            $tableName = $_GET['table'];
            $fullClassName = "App\\Models\\" . $tableName;
            $table = new $fullClassName();
        }

        return require __DIR__ . '../../../Resources/Views/Pages/Specialist/itemCreate.php';
    }

    public static function add_submit()
    {
        specialistController::verify();

        if (!empty($_POST)) {

            $tableName = $_GET['table'];
            $table = new ("App\\Models\\" . $tableName)();

            $added = $table->create($_POST);

            if ($added == true) {
                $getResults = $table->query->from($table->table);

                foreach ($table->fillable as $fillable) {
                    $getResults = $getResults->orWhere($fillable, 'LIKE', '%' . $_POST[$fillable] . '%');
                }
                $getResults = $getResults->get(false);

                header('Location: /specialist/item?table=' . $tableName . '&item=' . $getResults[count($getResults) - 1]['id']);
                exit();
            }

            header('Location: /specialist/item?table=' . $tableName . '&item=' . $table->id);
            exit();
        }
    }

    public static function item()
    {
        specialistController::verify();

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
        specialistController::verify();

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
        $relationshipTableName = $tableName . ucfirst($linkTableName);

        $table = new ("App\\Models\\" . $tableName)();
        $linkTable = new ("App\\Models\\" . $linkTableName)();
        $relationshipTable = new ("App\\Models\\" . $relationshipTableName)();

        // Get results of table items to be linked
        $toLinkResults = [];
        $getToLinkResults = $linkTable->query->from($linkTable->table);

        // Get results of already linked items
        $alreadyLinkedResults = [];
        $getAlreadyLinkedResults = $table->query->from($relationshipTableName)->where($tableName . '_id', '=', $_GET[$tableName . '_id']);

        // Deal with searches

        if (isset($_GET['search'])) {
            foreach ($linkTable->fillable as $fillable) {
                $getToLinkResults = $getToLinkResults->orWhere($fillable, 'LIKE', '%' . $_GET['search'] . '%');
            }
            foreach ($relationshipTable->fillable as $fillable) {
                $getAlreadyLinkedResults = $getAlreadyLinkedResults->orWhere($fillable, 'LIKE', '%' . $_GET['search'] . '%');
            }
            $getToLinkResults = $getToLinkResults->get(false);
            $getAlreadyLinkedResults = $getAlreadyLinkedResults->get(false);
        } else {
            $getToLinkResults = $getToLinkResults->get(false);
            $getAlreadyLinkedResults = $getAlreadyLinkedResults->get(false);
        }

        // Assign attributes to objects

        foreach ($getToLinkResults as $r) {
            $linktable = new ("App\\Models\\" . $linkTableName)();
            $linktable->fill($r);
            $toLinkResults[] = $linktable;
        }

        foreach ($getAlreadyLinkedResults as $r) {
            $relationshipTable = new ("App\\Models\\" . $relationshipTableName)();
            $relationshipTable->fill($r);
            $alreadyLinkedResults[] = $relationshipTable;
        }

        return require __DIR__ . '../../../Resources/Views/Pages/Specialist/link.php';
    }

    public static function item_link()
    {
        specialistController::verify();

        if (!isset($_GET['table'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (!isset($_GET['to'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (!isset($_GET[$_GET['table'] . '_id'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        if (!isset($_GET[$_GET['to'] . '_id'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $linkTableName = $_GET['table'] . ucfirst($_GET['to']);
        $fullClassName = "App\\Models\\" . $linkTableName;

        $table = $_GET['table'];
        $link = $_GET['to'];
        $edit = $_GET['type'] == 'edit' ? true : false;

        $itemToLink = new ("App\\Models\\" . ucfirst($link))();
        $linkTable = new $fullClassName();

        $itemToLink->fill($itemToLink->query->from($itemToLink->table)->where('id', '=', $_GET[$_GET['table'] . '_id'])->get());

        if ($edit == true) {
            $result = $linkTable->query->from($linkTable->table)->where("id", '=', $_GET['link'])->get();

            return require __DIR__ . '../../../Resources/Views/Pages/Specialist/linkEdit.php';
        }

        return require __DIR__ . '../../../Resources/Views/Pages/Specialist/linkCreate.php';
    }

    public static function item_link_submit()
    {
        specialistController::verify();

        if (!empty($_POST)) {

            $linkTableName = $_GET['table'] . ucfirst($_GET['to']);
            $fullClassName = "App\\Models\\" . $linkTableName;
            $linkTable = new $fullClassName();

            $linkTable->create($_POST);

            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit();
        }
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }

    public static function item_edit_link_submit()
    {
        specialistController::verify();

        $table = $_GET['table'];
        $link = $_GET['to'];

        if (!empty($_POST)) {

            $linkTableName = $_GET['table'] . ucfirst($_GET['to']);
            $fullClassName = "App\\Models\\" . $linkTableName;
            $linkTable = new $fullClassName();

            if (!empty($_POST['delete']) && $_POST['delete'] >= 0) {
                $linkTable->delete($_POST['delete']);

                header("Location: /specialist/link?table=" . $table . "&to=" . $link . "&" . $table . "_id=" . $_POST[$table . '_id']);
                exit();
            } else {
                $item = $_POST['item'];
                unset($_POST['item']);
                $linkTable->edit($item, $_POST);

                header("Location: /specialist/link?table=" . $table . "&to=" . $link . "&" . $table . "_id=" . $_POST[$table . '_id']);
                exit();
            }
        }
        header("Location: /specialist/link?table=" . $table . "&to=" . $link . "&" . $table . "_id=" . $_POST[$table . '_id']);
        exit;
    }

    public static function item_edit()
    {
        specialistController::verify();

        $tableName = $_GET['table'];
        $fullClassName = "App\\Models\\" . $tableName;
        $table = new $fullClassName();

        if (!empty($_POST['delete']) && $_POST['delete'] >= 0) {
            $table->delete($_POST['delete']);

            header("Location: /specialist/table?table=" . $tableName);
            exit();
        } else {
            $table->edit($_GET['item'], $_POST);
        }

        header("location: /specialist/item?table=" . $tableName . "&item=" . $_GET['item'] . "&message=Saved");
        exit();
    }
}
