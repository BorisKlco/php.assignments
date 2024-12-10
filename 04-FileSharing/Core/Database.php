<?php

namespace Core;

use PDO;
use PDOStatement;

class Database
{
    protected PDO $db = null;

    public static function instance()
    {
        if (self::$db === null) {
            self::$db = new PDO(
                'sqlite:' . BASE_PATH . "sqlite.db",
                options: [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]
            );
        }

        return self::$db;
    }

    public static function query(string $query, array $params = []): PDOStatement
    {
        try {
            $db = self::instance();
            $statement = $db->prepare($query);
            $statement->execute($params);
        } catch (\PDOException $e) {
            View::error();
        }
        return $statement;
    }
}
