<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\GamesModel;
use App\Models\ScoresModel;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class DisplayGamesController extends Controller
{
    private PhpRenderer $renderer;
    private GamesModel $gamesModel;
    private ScoresModel $scoresModel;

    public function __construct(PhpRenderer $renderer, GamesModel $gamesModel, ScoresModel $scoresModel)
    {
        $this->renderer = $renderer;
        $this->gamesModel = $gamesModel;
        $this->scoresModel = $scoresModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
            $args['gameList'] = $this->gamesModel->getGameList();
            $args['players'] = $this->scoresModel->getUniquePlayers();
            return $this->renderer->render($response, 'gamesList.phtml', $args);
    }
}
