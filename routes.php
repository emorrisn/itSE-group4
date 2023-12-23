<?php

use App\Controllers\adminController;
use App\Controllers\clientController;
use App\Controllers\searchController;
use App\Controllers\accountController;
use App\Controllers\specialistController;

/** 
 * routes.php
 *  Examines the requested URL and dynamically assigns a corresponding view based on the 
 *  specified destination.
 */

$request = $_SERVER['REQUEST_URI'];

// Begin session
if (session_status() == 1) {
    session_start();
}

// Exploding '?' to just get the request
if (str_contains($request, '?') == true) {
    $url = current(explode('?', $request));
} else {
    $url = $request;
}

// Switch
switch ($url) {
    case '/':
        require __DIR__ . '/Resources/Views/Pages/landing.php';
        break;
    case '/search':
        searchController::search();
        break;
    case '/account/login':
        accountController::login();
        break;
    case '/account/forgot':
        accountController::forgot();
        break;
    case '/login':
        accountController::sendlogin();
        break;
    case '/logout':
        accountController::logout();
        break;
    case '/account/register':
        accountController::register();
        break;
    case '/register':
        accountController::sendregister();
        break;
    case '/dashboard':
        clientController::dashboard();
        break;
    case '/account':
        accountController::account();
        break;
    case '/my/pin':
        clientController::pin();
        break;
    case '/my/meals':
        clientController::meals();
        break;
    case '/view/workout':
        clientController::workout_view();
        break;
    case '/new/workout':
        clientController::workout_new();
        break;
    case '/new-exercise/workout':
        clientController::workout_new_add();
        break;
    case '/edit-exercise/workout':
        clientController::workout_new_edit();
        break;
    case '/remove-exercise/workout':
        clientController::workout_new_remove();
        break;
    case '/my/workouts':
        clientController::workouts();
        break;
    case '/my/meals/new':
        clientController::meals_new();
        break;
    case '/view/log':
        clientController::meal_view();
        break;
    case '/my/meals/new/submit':
        clientController::meals_new_submit();
        break;
    case '/my/pr':
        clientController::personalTrainer();
        break;
    case '/reset/my/pin':
        clientController::pin_reset();
        break;
    case '/reset/my/trainer':
        accountController::trainer_reset();
        break;
    case '/edit/account':
        accountController::edit_account();
        break;
    case '/specialist':
        specialistController::dashboard();
        break;
    case '/admin':
        adminController::dashboard();
        break;
    case '/admin/table':
        adminController::table();
        break;
    case '/admin/item':
        adminController::item();
        break;
    case '/edit/item':
        adminController::item_edit();
        break;
    default: // Any: 404
        http_response_code(404);
        require __DIR__ . '/Resources/Views/Pages/other/404.php';
        break;
}
