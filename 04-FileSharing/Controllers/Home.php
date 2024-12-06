<?php

namespace Controllers;

use Core\View;

class Home
{

    public function index()
    {
        View::show('main/index');
    }
}
