<?php

namespace App\ViewHelpers;

class ScoresHelper
{
    public static function matchScores (array $allScores): array
    {
        $GameAndDateKeys = [];
        foreach ($allScores as $score) {
            $GameAndDateKeys[] = $score['game'] . ' - ' . $score['date'];
        }

        $valueCounts = array_count_values($GameAndDateKeys);
        $matchedScores = [];
        foreach ($valueCounts as $value => $count) {
            if ($count === 2) {
                $matchedScores[] = $value;
            }
        }
        return $matchedScores;
    }

    public static function displayTotalScore(array $allScores): string
    {
        $matchedScores = self::matchScores($allScores);
        $player1Total = 0;
        $player2Total = 0;
        foreach ($allScores as $score) {
            $scoreGameAndDate = $score['game'] . ' - ' . $score['date'];
            if (in_array($scoreGameAndDate, $matchedScores)) {
                if ($score['player'] === 'Cathy') {
                    $player1Total += $score['score'];
                } elseif ($score['player'] === 'Jake') {
                    $player2Total += $score['score'];
                }
            }
        }

        return '<p>Player One: ' . $player1Total . '</p>
                <p>Player Two: ' . $player2Total . '</p>';

    }

    public static function filteredScore(array $allScores, array $matchedScores, int $game, string $player): int
    {
        $playerScore = 0;
        foreach ($allScores as $score) {
            $scoreGameAndDate = $score['game'] . ' - ' . $score['date'];
            if (in_array($scoreGameAndDate, $matchedScores) && $score['game'] === $game && $score['player'] === $player) {
                $playerScore += $score['score'];
            }
        }
        return $playerScore;
    }

    public static function displayGameScores($allScores, $gameList): string
    {
        $output = '';
        foreach ($gameList as $game) {
            $output .= '<tr><td>' . $game['name'] . '</td>
                        <td style="text-align: center">' . self::filteredScore($allScores, self::matchScores($allScores), $game['id'], 'Cathy') . '</td>
                        <td style="text-align: center">' . self::filteredScore($allScores, self::matchScores($allScores), $game['id'], 'Jake') . '</td></tr>';

    }
        return $output;
    }
}
