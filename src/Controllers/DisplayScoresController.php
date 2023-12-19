<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\GamesModel;
use App\Models\ScoresModel;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class DisplayScoresController extends Controller
{
    private PhpRenderer $renderer;
    private ScoresModel $scoresModel;
    private GamesModel $gamesModel;

    public function __construct(PhpRenderer $renderer, ScoresModel $scoresModel, GamesModel $gamesModel)
    {
        $this->renderer = $renderer;
        $this->scoresModel = $scoresModel;
        $this->gamesModel = $gamesModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $args['allScores'] = $this->scoresModel->getScores();
        $args['gameList'] = $this->gamesModel->getGameList();
        $args['dateList'] = $this->scoresModel->getUniqueDates();
        $args['players'] = $this->scoresModel->getUniquePlayers();
        return $this->renderer->render($response, 'scores.phtml', $args);
    }

}
