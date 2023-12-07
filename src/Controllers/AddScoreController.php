<?php

namespace App\Controllers;

use App\Abstracts\Controller;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
use App\Models\ScoresModel;

class AddScoreController extends Controller
{

    private ScoresModel $scoresModel;

    public function __construct(ScoresModel $scoresModel)
    {
        $this->scoresModel = $scoresModel;
    }

    /**
     * Get user input and send to ScoresModel to add to db.
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $newGameScore = $request->getParsedBody();

        $responseData = [
            'success' => false,
            'message' => 'Unexpected Error.',
            'data' => []
        ];
        $statusCode = 400;

        try {
            $insertedId = $this->scoresModel->addScore($newGameScore);
        } catch (\PDOException $pdoException) {
            $responseData['message'] = 'Internal error: ' . $pdoException->getMessage();
            $statusCode = 500;
        } catch (\Exception $exception) {
            $responseData['message'] = $exception->getMessage();
        }

        if (isset($insertedId) && $insertedId) {
            $responseData = [
                'success' => true,
                'message' => 'New score successfully added.',
                'data' => []
            ];
            $statusCode = 200;
        }
        return $this->respondWithJson($response, $responseData, $statusCode);
    }
}