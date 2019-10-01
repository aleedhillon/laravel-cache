<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Facades\App\Repository\Users;
use Illuminate\Support\Facades\Cache;

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
        // $key = Users::getCacheKey('all.id');
        // $users = Users::all();
        $users = User::all();
        // return response()->json($users, 200);

        return view('welcome')->with('users', $users);
    }
}
