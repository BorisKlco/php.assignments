<?php

namespace Controllers;

use Core\View;

class Home
{

    public function index()
    {
        View::show('main/index');
    }
    public function upload()
    {
        if (isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
            $fileTooBig = $_FILES['file']['size'] > (10 * 1024 * 1024);
            $fileName = $_FILES['file']['name'];
            $tmp = $_FILES['file']['tmp_name'];
        } else {
            View::error();
        }

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
