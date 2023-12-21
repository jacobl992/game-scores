<?php

namespace App\ViewHelpers;

class ScoresHelper
{
    //player dropdown
    public static function playerPageLinks(array $players): string
    {
        $output = '';
        foreach ($players as $player) {
            $output .=
                '<p></p><a href="/players/' . $player['player'] . '">' . $player['player'] . '&#39s scores</a></p>';
        }
        return $output;
    }

    //dateDropdown
    //need to reformat date string
    public static function datesDropdown(array $dateList): string
    {
        $output = '';
        foreach ($dateList as $date) {
            $output .=
                '<option value="' . $date['date'] . '">' . $date['date'] . '</option>';
        }
        return $output;
    }

    //which games have scores on the same day for both players
    public static function matchScores(array $allScores): array
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

    //adding total scores for each player if both played the same a game on same data
    //adding css class to format current winner
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

        $p1WinningColor = '';
        $p2WinningColor = '';

        if ($player1Total < $player2Total) {
            $p1WinningColor = 'winner';
        } elseif ($p2WinningColor < $player1Total) {
            $p2WinningColor = 'winner';
        }

        return '<p class="' . $p1WinningColor . '">C-dawg: ' . $player1Total . '</p>
                <p class="' . $p2WinningColor . '">J-dawg: ' . $player2Total . '</p>';

    }

//sum scores for each player, by game
    public static function filteredScoreByGame(array $allScores, array $matchedScores, int $game, string $player): int
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

    //compare scores between players and output winner
    public static function scoreComparison(int $player1Score, int $player2Score): string
    {
        $outcome = '';
        if ($player1Score < $player2Score) {
            $outcome = 'C-dawg';
        } elseif ($player2Score < $player1Score) {
            $outcome = 'J-dawg';
        } else {
            $outcome = 'Equality';
        }
        return $outcome;
    }

    //output scores for each game and player and the winner
    public static function displayGameScores($allScores, $gameList): string
    {
        $output = '';
        foreach ($gameList as $game) {
            $cDawgScore = self::filteredScoreByGame($allScores, self::matchScores($allScores), $game['id'], 'Cathy');
            $jDawgScore = self::filteredScoreByGame($allScores, self::matchScores($allScores), $game['id'], 'Jake');


            $output .= '<tr><td>' . $game['name'] . '</td>
                        <td class="center-in-t">' . $cDawgScore . '</td>
                        <td class="center-in-t">' . $jDawgScore . '</td>
                        <td class="center-in-t">' . self::scoreComparison($cDawgScore, $jDawgScore) . '</td></tr>';;

        }
        return $output;
    }
}
