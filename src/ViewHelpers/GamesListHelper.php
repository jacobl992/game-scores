<?php

namespace App\ViewHelpers;

class GamesListHelper
{

    public static function displayGameList(array $gameList): string
    {
        $result = '';
        foreach ($gameList as $game) {
            $result .=
                '<div>
                    <p><a href="' . $game['link'] . '">' . $game['name'] . '</a></p>
                </div>';
        }
        return $result;
    }
}