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

$buildDb = 'CREATE TABLE IF NOT EXISTS users(
id INTEGER PRIMARY KEY,
name TEXT,
email TEXT,
tel TEXT)
';

Database::q($buildDb);

$records = Database::q('SELECT COUNT(*) as count FROM users')->fetch();

if ($records['count'] == 0) {
    $insertUsers = "
INSERT INTO users (name, email, tel) VALUES
('Alice', 'alice42@example.com', '1234567890'),
('Bob', 'bob21@test.com', '2345678901'),
('Charlie', 'charlie77@mail.com', '3456789012'),
('Diana', 'diana88@example.com', '4567890123'),
('Eve', 'eve34@test.com', '5678901234'),
('Frank', 'frank65@mail.com', '6789012345'),
('Grace', 'grace19@example.com', '7890123456'),
('Hank', 'hank90@test.com', '8901234567'),
('Ivy', 'ivy12@mail.com', '9012345678'),
('Jack', 'jack55@example.com', '1234567891')";
    Database::q($insertUsers);
}
