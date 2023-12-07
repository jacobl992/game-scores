<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use App\Models\GamesModel;
use Psr\Http\Message\RequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use Slim\Views\PhpRenderer;

class DisplayGamesController extends Controller
{
    private PhpRenderer $renderer;
    private GamesModel $gamesModel;

    public function __construct(PhpRenderer $renderer, GamesModel $gamesModel)
    {
        $this->renderer = $renderer;
        $this->gamesModel = $gamesModel;
    }

    public function __invoke(Request $request, Response $response, array $args): Response
    {
            $args['gameList'] = $this->gamesModel->getGameList();
            return $this->renderer->render($response, 'gamesList.phtml', $args);
    }
}
