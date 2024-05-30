<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mycontroller extends Controller
{
    public function getxinchao($ten, $namsinh)
    {
        return 'xin chào bạn ' .$ten. '<br>có năm sinh là: ' .$namsinh;
    }
}
