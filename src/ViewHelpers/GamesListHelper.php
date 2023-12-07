<?php

namespace App\ViewHelpers;

class GamesListHelper
{

    public static function displayGameList(array $gameList): string
    {
        $result = '';
        foreach ($gameList as $game) {
            $result .=
                '<tr>
                    <td><a href="' . $game['link'] . '">' . $game['name'] . '</a></td>
                    <td>Add score</td>
                </tr>';
        }
        return $result;
    }
}
