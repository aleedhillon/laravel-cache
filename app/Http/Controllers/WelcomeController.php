<?php

namespace App\Http\Controllers;

use App\User;
use Facades\App\Repository\Users;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $users = Users::all();
        return view('welcome')->with('users', $users);
    }
}
