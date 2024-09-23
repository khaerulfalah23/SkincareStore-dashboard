<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Nette\Utils\Arrays;
use Nette\Utils\Strings;

class DashboardController extends Controller
{
    public function index()
    {
        return view("dashboard");
    }
}
