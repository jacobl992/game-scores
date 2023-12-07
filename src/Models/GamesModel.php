<?php

namespace App\Models;

use PDO;

class GamesModel
{
    protected PDO $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getGameList(): array {
        $sql = 'SELECT `id`,
                `name`,
                `link`
                FROM `games`;';
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

}
