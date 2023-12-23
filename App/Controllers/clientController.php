<?php

namespace App\Controllers;

use Exception;
use App\Models\Diet;
use App\Models\Meal;
use App\Models\User;
use App\Models\MealLog;
use App\Models\Workout;
use App\Models\Exercise;
use App\Models\ExerciseLog;
use App\Models\UserWorkout;
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


        if (isset($_GET['date'])) {
            // Check if the date request is present and is a previous date
            if ($_GET['date'] && strtotime($_GET['date']) < strtotime('today')) {
                $logTab = '';
                $targetTab = 'hidden';
                $logBtn = 'active';
                $targetBtn = '';
            } else {
                $logTab = 'hidden';
                $targetTab = '';
                $logBtn = '';
                $targetBtn = 'active';
            }
        } else {
            $logTab = 'hidden';
            $targetTab = '';
            $logBtn = '';
            $targetBtn = 'active';
        }

        if (isset($_REQUEST['diet'])) {
            $diet = new Diet();

            if (isset($_GET['date'])) {
                $attributes = $diet->query->from($diet->table)
                    ->where('id', '=', $_REQUEST['diet'])
                    ->where('start_date', '<=', date_format(date_create($_GET['date']), "Y-m-d"))
                    ->where('end_date', '>=', date_format(date_create($_GET['date']), "Y-m-d"))
                    ->get();
            } else {
                $attributes = $diet->query->from($diet->table)
                    ->where('id', '=', $_REQUEST['diet'])
                    ->where('start_date', '<=', date("Y-m-d"))
                    ->where('end_date', '>=', date("Y-m-d"))
                    ->get();
            }

            if ($attributes != null) {
                $diet->fill($attributes);
                $meals = $diet->meals();
            } else {
                $meals = [];
            }
        } else {
            $meals = AuthenticationHelper::getUser()->userDiet();
            if ($meals != null) {
                $meals = $meals[0]->diet()->meals();
            } else {
                $meals = [];
            }
        }

        $hasMeal = false;


        return require __DIR__ . '../../../Resources/Views/Pages/client/meals/meals.php';
    }

    public static function workouts()
    {
        authenticationHelper::isAuth();

        if (isset($_GET['date'])) {
            $date = date_format(date_create($_GET['date']), "Y-m-d");
            $dayNumber = date("N", strtotime($date));
        } else {
            $date = date("Y-m-d");
            $dayNumber = date("N");
        }

        $workout = new UserWorkout();
        $workouts = [];

        $attributes = $workout->query->from($workout->table)
            ->where('start_date', '<=', $date)
            ->where('completion_date', '>=', $date)
            ->get(false);

        foreach ($attributes as $attribute) {
            $new = new UserWorkout();
            $new->fill($attribute);

            if ($new->days != null) {
                $days = explode(",", $new->days);
                if (in_array($dayNumber, $days)) {
                    $workouts[] = $new;
                }
            }
        }


        return require __DIR__ . '../../../Resources/Views/Pages/client/workouts/workouts.php';
    }

    public static function workout_view()
    {
        authenticationHelper::isAuth();

        $workout = new Workout();

        if (!isset($_GET['workout'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $attributes = $workout->query->from($workout->table)
            ->where('id', '=', $_GET['workout'])
            ->get();

        if ($attributes != null) {
            $workout->fill($attributes);
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }


        return require __DIR__ . '../../../Resources/Views/Pages/client/workouts/view.php';
    }

    public static function workout_new()
    {
        authenticationHelper::isAuth();


        $workout = new Workout();

        if (!isset($_GET['workout'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $attributes = $workout->query->from($workout->table)
            ->where('id', '=', $_GET['workout'])
            ->get();

        if ($attributes != null) {
            $workout->fill($attributes);
        } else {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $exerciseLog = []; // needs to be for this user, for the current date and for this workout
        $log = new ExerciseLog();

        $attributes = $log->query->from($log->table)
            ->where('user_id', '=', AuthenticationHelper::getUser()->id)
            ->where('workout_id', '=', $_GET['workout'])
            ->where('created_at', 'LIKE', date("Y-m-d") . '%')
            ->get(false);

        foreach ($attributes as $attribute) {
            $new = new ExerciseLog();
            $new->fill($attribute);
            $exerciseLog[] = $new;
        }

        return require __DIR__ . '../../../Resources/Views/Pages/client/workouts/new.php';
    }

    public static function workout_new_add()
    {
        authenticationHelper::isAuth();

        if (!empty($_POST)) {

            $validator = new ValidationHelper($_POST);

            $validationRules = [
                ['field' => 'workout', 'methods' => ['required'], 'message' => 'Workout is required.'],
                ['field' => 'exercise', 'methods' => ['required'], 'message' => 'Invalid exercise.'],
            ];

            $validator->validate($validationRules);

            if (!$validator->isValid()) {
                $errorMessages = implode(', ', $validator->getErrors());
                header("location: /new/workout?workout=" + $_POST['workout'] . "&error=" . urlencode($errorMessages));
                exit();
            }

            $exerciseLog = new ExerciseLog();
            $exerciseLog->create([
                'user_id' => AuthenticationHelper::getUser()->id,
                'workout_id' => $_POST['workout'],
                'exercise_id' => $_POST['exercise'],
                'reps' => 0,
                'size' => 0,
                'duration' => 0,
                'notes' => '',
                'perceived_difficulty_level' => 0,
                'fatigue_level' => 0,
                'motivation_level' => 0
            ]);

            header("location: /new/workout#excercise-" . $exerciseLog->id . "?workout=" . $_POST['workout'] . "&message=Workout added");
            exit();
        }
        header("location: /new/workout?workout=" . $_POST['workout'] . "&error=Something went wrong, try again.");
        exit();
    }

    public static function workout_new_edit()
    {
        authenticationHelper::isAuth();

        if (!empty($_POST)) {

            $validator = new ValidationHelper($_POST);

            $validationRules = [
                ['field' => 'reps', 'methods' => ['required'], 'message' => 'Reps is required.'],
                ['field' => 'difficulty_level', 'methods' => ['required'], 'message' => 'A difficulty level is required.'],
                ['field' => 'weight', 'methods' => ['nullable'], 'message' => 'Weight is invalid.'],
                ['field' => 'duration', 'methods' => ['required'], 'message' => 'Duration is required'],
                ['field' => 'notes', 'methods' => ['nullable'], 'message' => 'Notes is invalid.'],
                ['field' => 'exercise', 'methods' => ['required'], 'message' => 'Invalid exercise.'],
                ['field' => 'workout', 'methods' => ['required'], 'message' => 'Invalid workout.'],
            ];

            $validator->validate($validationRules);

            if (!$validator->isValid()) {
                $errorMessages = implode(', ', $validator->getErrors());
                header("location: /new/workout?workout=" . $_POST['workout'] . "&error=" . urlencode($errorMessages));
                exit();
            }

            $exerciseLog = new ExerciseLog();

            $attributes = $exerciseLog->query->from($exerciseLog->table)
                ->where('user_id', '=', AuthenticationHelper::getUser()->id)
                ->where('id', '=', $_POST['exercise'])
                ->get();

            $exerciseLog->fill($attributes);

            $exerciseLog->edit($exerciseLog->id, [
                'reps' => $_POST['reps'],
                'size' => $_POST['weight'],
                'duration' => $_POST['duration'],
                'notes' => $_POST['notes'],
                'perceived_difficulty_level' => $_POST['difficulty_level'],
                // 'fatigue_level' => $_POST['fatigue_level'],
                // 'motivation_level' => $_POST['motivation_level']
            ]);

            header("location: /new/workout#excercise-" . $exerciseLog->id . "?workout=" . $_POST['workout'] . "&message=Workout edited");
            exit();
        }
        header("location: /new/workout?workout=" . $_POST['workout'] . "&error=Something went wrong, try again.");
        exit();
    }

    public static function workout_new_remove()
    {
        authenticationHelper::isAuth();

        $log = new ExerciseLog();

        $attributes = $log->query->from($log->table)
            ->where('id', '=', $_GET['exercise'])
            ->where('user_id', '=', AuthenticationHelper::getUser()->id)
            ->where('workout_id', '=', $_GET['workout'])
            ->where('created_at', 'LIKE', date("Y-m-d") . '%')
            ->get();

        $log->fill($attributes);
        $log->delete($log->id);

        header("location: /new/workout?workout=" . $_POST['workout'] . "&message=Workout deleted");
        exit();
    }

    public static function meals_new()
    {
        authenticationHelper::isAuth();
        return require __DIR__ . '../../../Resources/Views/Pages/client/meals/new.php';
    }

    public static function meal_view()
    {
        authenticationHelper::isAuth();
        $currentMeal = new MealLog();

        if (!isset($_GET['meal'])) {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit;
        }

        $attributes = $currentMeal->query->from($currentMeal->table)
            ->where('id', '=', $_GET['meal'])
            ->get();

        if ($attributes != null) {
            $currentMeal->fill($attributes);
        } else {
            $meals = [];
        }

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
