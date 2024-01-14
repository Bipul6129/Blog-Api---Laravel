<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FallbackController extends Controller
{
    public function __invoke()
    {
        return response()->json([
            'error' => 'Oops some kind of error',
            'message' => 'Some error occured ',
        ], 404);
    }
}
