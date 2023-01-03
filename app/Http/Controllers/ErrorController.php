<?php

declare(strict_types=1);

namespace App\Http\Controllers;

class ErrorController extends Controller
{
    public function notFound()
    {
        return view('errors.404');
    }
}
