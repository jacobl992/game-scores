<?php

namespace App\Models;

use PDO;

class ScoresModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getFiveMostRecentDates(): array
    {
        $sql = 'SELECT DISTINCT `date`
            FROM `scores`
            ORDER BY date ASC
            LIMIT 5;';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getScores(?string $date = null): array
    {
        if ($date === null) {
            $sql = 'SELECT `id`,
                `player`,
                `game`,
                `date`,
                `score`
                FROM `scores`;';
        } else {
            $sql = 'SELECT `id`,
                `player`,
                `game`,
                `date`,
                `score`
                FROM `scores`
                WHERE `date` = :date;';
        }

        $query = $this->db->prepare($sql);

        if ($date !== null) {
            $query->bindParam(':date', $date);
        }

        $query->execute();
        return $query->fetchAll();
    }

    public function getPlayerScores(string $player): array
    {
        $sql = 'SELECT `id`,
                `player`,
                `game`,
                `date`,
                `score`
                FROM `scores`
                WHERE `scores`.`player` = :player;';
        $query = $this->db->prepare($sql);
        $query->bindParam(':player', $player);
        $query->execute();
        return $query->fetchAll();
    }

    public function getUniqueDates(): array
    {
        $sql = 'SELECT DISTINCT `date`
                FROM `scores`';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getUniquePlayers(): array
    {
        $sql = 'SELECT DISTINCT `player`
                FROM `scores`';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function addScore(array $newGameScore): string
    {
        $sql = "INSERT INTO `scores` (
            `player`,
            `game`,
            `date`,
            `score`
            ) 
            VALUES (
            :player, 
            :game, 
            :date,
            :score);";

        $query = $this->db->prepare($sql);
        $query->bindParam(':player', $newGameScore['player']);
        $query->bindParam(':game', $newGameScore['game']);
        $query->bindParam(':date', $newGameScore['date']);
        $query->bindParam(':score', $newGameScore['score']);
        $query->execute();
        return $this->db->lastInsertId();
    }
}
