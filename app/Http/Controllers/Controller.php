<?php

namespace App\Http\Controllers;

use App\Support\ReturnResponse;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

abstract class Controller
{
    use AuthorizesRequests, ReturnResponse;
}
