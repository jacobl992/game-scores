<?php
declare(strict_types=1);

use App\Controllers\DisplayGamesController;
use Slim\App;


return function (App $app) {
    $app->get('/', DisplayGamesController::class);
};
