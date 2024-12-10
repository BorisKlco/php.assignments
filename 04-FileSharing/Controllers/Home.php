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
        echo '<pre>';
        var_dump($_POST, $_REQUEST, $_FILES);
    }
}
