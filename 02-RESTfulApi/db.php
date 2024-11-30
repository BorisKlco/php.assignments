<?php

class Database
{

    private static \PDO $db;

    public function __construct()
    {

        self::$db = new \PDO('sqlite:' . BASE_PATH . 'db.sqlite', options: [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }

    public static function q($query, $params = [])
    {
        $db = self::$db;
        $statement = $db->prepare($query);
        $statement->execute($params);

        return $statement;
    }
}


new Database();

$buildDb = 'CREATE TABLE IF NOT EXISTS tasks(
id INTEGER PRIMARY KEY,
task TEXT,
token TEXT,
removed INTEGER DEFAULT 0,
created TEXT DEFAULT current_timestamp,
modified TEXT)
';

Database::q($buildDb);
