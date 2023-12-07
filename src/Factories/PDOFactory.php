<?php

declare(strict_types=1);

namespace App\Factories;

use PDO;
use Psr\Container\ContainerInterface;

class PDOFactory
{
    public function __invoke(ContainerInterface $container): PDO
    {
        $settings = $container->get('settings')['db'];
        $db = new PDO('mysql:host=DB;' . 'dbname=game_scores', 'root', 'password');
        $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // uncomment to debug DB errors
        return $db;
    }
}