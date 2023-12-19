<?php
declare(strict_types=1);

use App\Controllers\DisplayGamesController;
use App\Controllers\DisplayScoresController;
use App\Controllers\AddScoreController;
use App\Controllers\FilterDateController;
use Slim\App;


return function (App $app) {
    $app->get('/', DisplayGamesController::class);
    $app->get('/scores', DisplayScoresController::class);
    $app->post('/addScore', AddScoreController::class);

    $app->get('/scores/{date}', FilterDateController::class);
    
};
