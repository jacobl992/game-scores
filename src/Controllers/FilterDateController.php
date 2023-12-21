<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use Slim\Views\PhpRenderer;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\ScoresModel;
use App\Models\GamesModel;

class FilterDateController extends Controller
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
        $date = $args['date'];
        $validDatesReturned = $this->scoresModel->getUniqueDates();
        $validDates = [];

        foreach ($validDatesReturned as $validDateReturned) {
            $validDates[] = $validDateReturned['date'];
        }

        if (!in_array($date, $validDates)) {
            return $response->withStatus(400)->withJson(['Error' => $date . ' not in database']);
        }

        $args['allScores'] = $this->scoresModel->getScores($date);
        $args['gameList'] = $this->gamesModel->getGameList();
        $args['dateList'] = $this->scoresModel->getUniqueDates();
        return $this->renderer->render($response, 'onDateCompareScores.phtml', $args);
    }

}