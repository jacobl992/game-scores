<?php

namespace App\ViewHelpers;

class ScoresHelper
{
    public static function displayScores(array $allScores): string
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
}
