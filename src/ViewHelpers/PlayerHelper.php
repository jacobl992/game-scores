<?php

namespace App\ViewHelpers;

class PlayerHelper
{
    public static function getPlayer(): string
    {
        $currentUrl = $_SERVER['REQUEST_URI'];
        return explode('/', $currentUrl)[2];
    }

    public static function getMostRecentDates($mostRecentDates): array
    {
        return $mostRecentDates;
    }

    public static function getTotalScoreForPlayer($allScores)
    {
        $playerScore = 0;

        foreach ($allScores as $score) {
            if ($score['player'] === self::getPlayer()) {
                $playerScore += $score['score'];
            }
        }
        return $playerScore;
    }

    public static function tableGameList(array $gameList): string
    {
        $output = '<h4>Game</h4>';
        foreach ($gameList as $game) {
            $output .= '<p>' . $game['name'] . '</p>';
        }
        return $output;
    }

    public static function getTotalScoreForPlayerOnDate(array $allScores, array $gameList, string $date): string
    {
        $output = '<h4>' . $date . '</h4>';
        foreach ($gameList as $game) {
            $autoOutput = '<p>0</p>';
            $scoreOutput = '';
            foreach ($allScores as $score) {
                if ($date === $score['date'] && $game['id'] === $score['game'] && $score['player'] === self::getPlayer()) {
                    $scoreOutput = '<p>' . $score['score'] . '</p>';
                }
            }
            if (!$scoreOutput) {
                $output .= $autoOutput;
            } else {
                $output .= $scoreOutput;
            }

        }
        return $output;
    }
}