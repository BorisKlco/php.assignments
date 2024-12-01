<?php
session_start();
$req = parse_url($_SERVER["REQUEST_URI"])['path'];
$method = $_SERVER['REQUEST_METHOD'];

$db = new PDO('sqlite:db.sqlite', options: [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
$routes = [
    'login' => ['path' => "/", 'method' => 'POST'],
    'create' => ['path' => "/reg", 'method' => 'POST'],
    'destroy' => ['path' => "/logout", 'method' => 'POST']
];

foreach ($routes as $key => $route) {
    if ($req == $route['path'] && $method == $route['method']) {
        call_user_func($key);
    }
}

function login()
{
    $data = sanitaze();
    $getUser = q("SELECT * FROM users WHERE username = ? ", [$data['username']])->fetch();
    if ($getUser && password_verify($data['password'], $getUser['password'])) {
        $_SESSION['user'] = $getUser['username'];
    } else {
        $_SESSION['error']['username'] = 'Username or Password is not correct.';
    }
    header('Location: /');
    exit();
}

function create()
{
    $data = sanitaze();
    $error = [];

    if (!validateEmail($data['email'])) {
        $error['email'] = 'Email is not valid';
    }
    if (!validateLength($data['username'], 4)) {
        $error['username'] = 'Username must be at least 4 characters.';
    }
    if (!validateLength($data['password'], 6)) {
        $error['password'] = 'Password must be at least 6 characters.';
    }

    if ($error) {
        $_SESSION['old'] = $data;
        $_SESSION['error'] = $error;
        header('Location: /reg');
        exit();
    }

    $createUser = q('INSERT INTO users (username, email, password) VALUES (:username, :email, :password)', [
        'username' => $data['username'],
        'email' => $data['email'],
        'password' => password_hash($data['password'], PASSWORD_DEFAULT)
    ]);
    $_SESSION['user'] = $data['username'];
    header('Location: /');
    exit();
}

function destroy()
{
    session_destroy();
    header('Location: /');
}

?>


<!DOCTYPE html>
<html lang="en" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
        src="https://cdn.tailwindcss.com?plugins=forms,typography,aspect-ratio,line-clamp,container-queries"></script>
    <title>LoginForm</title>
</head>

<body class="h-full grid place-items-center bg-gray-100">
    <div>
        <nav class="flex justify-center gap-4 mb-6 w-full border-b pb-2">
            <?php if ($_SESSION['user'] ?? false) : ?>
                <p class="font-semibold"><?= ucfirst($_SESSION['user']) ?></p>
                <form action="/logout" method="POST">
                    <button name="action" value="logout" type="submit">Logout</button>
                </form>
            <?php else : ?>
                <a href="/" class="hover:underline">Login</a>
                <a href="/reg" class="hover:underline">Register</a>
            <? endif ?>
        </nav>
        <?php if ($_SESSION['user'] ?? false) : ?>
            <div class="w-full">
                <h1 class="text-center">Hello</h1>
            </div>
        <?php else : ?>
            <?php if ($req == '/') : ?>
                <form action="" method="post" class="flex flex-col">
                    <label for="username">Username:</label>
                    <input id="username" name="username" type="text" class="py-1 px-2 rounded">
                    <span class="text-red-600"><?= $_SESSION['error']['username'] ?? '' ?></span>
                    <label for="password">Password:</label>
                    <input id="password" name="password" type="password" class="py-1 px-2 rounded">
                    <button type="submit" class="bg-gray-400 text-white mt-4 py-1 border rounded hover:border-black">Login</button>
                </form>
            <?php endif ?>
            <?php if ($req == '/reg') : ?>
                <form action="/reg" method="post" class="flex flex-col">
                    <label for="username">Username:</label>
                    <input id="username" name="username" type="text" class="py-1 px-2 rounded" value="<?= $_SESSION['old']['username'] ?? '' ?>">
                    <span class="text-red-600"><?= $_SESSION['error']['username'] ?? '' ?></span>
                    <label for="email">Email:</label>
                    <input id="email" name="email" type="email" class="py-1 px-2 rounded" value="<?= $_SESSION['old']['email'] ?? '' ?>">
                    <span class="text-red-600"><?= $_SESSION['error']['email'] ?? '' ?></span>
                    <label for="password">Password:</label>
                    <input id="password" name="password" type="password" class="py-1 px-2 rounded">
                    <span class="text-red-600"><?= $_SESSION['error']['password'] ?? '' ?></span>
                    <button type="submit" class="bg-gray-400 text-white mt-4 py-1 border rounded hover:border-black">Register</button>
                </form>
            <?php endif;
            unset($_SESSION['error'], $_SESSION['old']); ?>
        <? endif ?>
    </div>
</body>

</html>


<?php
//db build
$buildDb = 'CREATE TABLE IF NOT EXISTS users(
    id INTEGER PRIMARY KEY,
    username TEXT,
    email TEXT,
    password TEXT)
    ';
q($buildDb);

//helpers
function q($q, $params = [])
{
    global $db;
    $statement = $db->prepare($q);
    $statement->execute($params);
    return $statement;
}

function validateLength($input, $length)
{
    return strlen($input) >= $length;
}

function validateEmail($email)
{
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

function sanitaze()
{
    $data = [];
    foreach ($_REQUEST as $key => $param) {
        $data[$key] = htmlentities($param);
    }

    return $data;
}

function dd(...$args)
{
    echo '<pre>';
    foreach ($args as $arg) {
        var_dump($arg);
    }
    exit();
}
?>