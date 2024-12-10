<?php

namespace Controllers;

use Core\View;
use DateTime;

class Home
{

    public function index()
    {
        View::show('main/index');
    }
    public function upload()
    {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $expiration = $_REQUEST['expiration'];
            $fileTooBig = $_FILES['file']['size'] > (10 * 1024 * 1024);
            $fileName = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
        } else {
            View::error();
        }

        $date = match ($expiration) {
            'day' => (new DateTime())->modify('+1 day')->format('Y-m-d H:i:s'),
            'week' => (new DateTime())->modify('+1 week')->format('Y-m-d H:i:s'),
            'never' => null,
        };

        var_dump($date);
        exit();

        if ($fileTooBig) {
            View::partial('upload/error');
        }

        if (move_uploaded_file($tmp, FILES . $fileName)) {
            View::partial('upload/ok');
        } else {
            View::error();
        }
    }
}
