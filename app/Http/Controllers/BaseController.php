<?php

namespace App\Http\Controllers;

use App\Models\Navigation;

class BaseController extends Controller
{

    public $data;

    public function __construct()
    {
        $this->data["menu"] = Navigation::getMenu();
    }

}
