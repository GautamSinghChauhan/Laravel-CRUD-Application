<?php

namespace App\Http\Controllers;

use App\Helpers\CustomHelper;

class ExampleController extends Controller
{
    public function greetUser($name)
    {
        return CustomHelper::greet($name);
    }
}
