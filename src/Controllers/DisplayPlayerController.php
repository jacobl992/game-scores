<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\ScoresModel;
use App\Models\GamesModel;

class DisplayPlayerController extends Controller
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
        $player = $args['player'];
        $validPlayersReturned = $this->scoresModel->getUniquePlayers();
        $validPlayers = [];

        foreach ($validPlayersReturned as $validPlayerReturned) {
            $validPlayers[] = $validPlayerReturned['player'];
        }

        if (!in_array($player, $validPlayers)) {
            return $response->withStatus(400)->withJson(['Error' => $player . ' not in database']);
        }

        $args['allScores'] = $this->scoresModel->getScores();
        $args['gameList'] = $this->gamesModel->getGameList();
        $args['dateList'] = $this->scoresModel->getUniqueDates();
        $args['players'] = $this->scoresModel->getUniquePlayers();
        $args['mostRecentDates'] = $this->scoresModel->getFiveMostRecentDates();
        return $this->renderer->render($response, 'playerScores.phtml', $args);
    }

}