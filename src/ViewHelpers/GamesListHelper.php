<?php

namespace App\ViewHelpers;

class GamesListHelper
{

    public static function displayGameList(array $gameList): string
    {
        $output = '';
        foreach ($gameList as $game) {
            $output .=
                '<p><a href="' . $game['link'] . '">' . $game['name'] . '</a></p>';
        }
        return $output;
    }

    public static function gameDropdown(array $gameList): string
    {
        $output = '';
        foreach ($gameList as $game) {
            $output .=
                '<option value="' . $game['id'] . '">' . $game['name'] . '</option>';
        }
        return $output;
    }
}
