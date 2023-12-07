<?php
declare(strict_types=1);

use App\Controllers\DisplayGamesController;
use App\Controllers\DisplayScoresController;
use Slim\App;


return function (App $app) {
    $app->get('/', DisplayGamesController::class);
    $app->get('/scores', DisplayScoresController::class);
};
