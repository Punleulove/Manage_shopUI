<?php

namespace App\Http\Controllers;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
date_default_timezone_set("Asia/Phnom_penh");

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
