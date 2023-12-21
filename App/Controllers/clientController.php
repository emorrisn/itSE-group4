<?php

namespace App\Controllers;

use App\Models\User;
use App\Models\MealLog;
use App\Helpers\DatabaseHelper;
use App\Helpers\ValidationHelper;
use App\Helpers\AuthenticationHelper;

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

    public static function meals()
    {
        authenticationHelper::isAuth();
        return require __DIR__ . '../../../Resources/Views/Pages/client/meals/meals.php';
    }

    public static function meals_new()
    {
        authenticationHelper::isAuth();
        return require __DIR__ . '../../../Resources/Views/Pages/client/meals/new.php';
    }

    public static function meal_view()
    {
        authenticationHelper::isAuth();
        return require __DIR__ . '../../../Resources/Views/Pages/client/meals/view.php';
    }

    public static function meals_new_submit()
    {
        authenticationHelper::isAuth();

        if (!empty($_POST)) {

            $validator = new ValidationHelper($_POST);

            $validationRules = [
                ['field' => 'meal', 'methods' => ['required', 'string'], 'message' => 'Meal is required.'],
                ['field' => 'date_eaten', 'methods' => ['required'], 'message' => 'Invalid date.'],
                ['field' => 'time_eaten', 'methods' => ['required'], 'message' => 'Invalid Time'],
                ['field' => 'satisfaction', 'methods' => ['required'], 'message' => 'Satisfaction is required'],
                ['field' => 'location', 'methods' => ['required'], 'message' => 'Satisfaction is required'],
                ['field' => 'mood', 'methods' => ['required'], 'message' => 'Mood is required'],
            ];

            $validator->validate($validationRules);

            if (!$validator->isValid()) {
                $errorMessages = implode(', ', $validator->getErrors());
                header("location: /my/meals/new/?error=" . urlencode($errorMessages));
                exit();
            }

            // print_r([
            //     'user_id' => AuthenticationHelper::getUser()->id,
            //     'diet_id' => explode(':', $_POST['meal'])[0],
            //     'meal_id' => explode(':', $_POST['meal'])[1],
            //     'time_of_consumption' => $_POST['date_eaten'] . " " . $_POST['time_eaten'],
            //     'satisfaction_level' => $_POST['satisfaction'],
            //     'location_of_consumption' => $_POST['location'],
            //     'mood_during_consumption' => $_POST['mood'],
            //     'additional_comments' => isset($_POST['additional_comments']) ? $_POST['additional_comments'] : 'N/A',
            // ]);
            // die();

            $meal = new MealLog();
            $meal->create([
                'user_id' => AuthenticationHelper::getUser()->id,
                'diet_id' => explode(':', $_POST['meal'])[0],
                'meal_id' => explode(':', $_POST['meal'])[1],
                'time_of_consumption' => $_POST['date_eaten'] . " " . $_POST['time_eaten'],
                'satisfaction_level' => $_POST['satisfaction'],
                'location_of_consumption' => $_POST['location'],
                'mood_during_consumption' => $_POST['mood'],
                'additional_comments' => isset($_POST['additional_comments']) ? $_POST['additional_comments'] : 'N/A',
            ]);

            header("location: /my/meals?message=Saved");
            exit();
        }
        header("location: /my/meals/new?error=Something went wrong, try again.");
        exit();
    }
}
