<?php

namespace App\Http\Controllers;

use App\Http\Services\FindUserGithubAPI;
use Illuminate\Http\Request;

class RetrieveUser extends Controller
{
    public function find(Request $request)
    {
        $userName = $request->user;

        $userInfo = FindUserGithubAPI::findUser($userName);

        return view('welcome', ['userInfo' => $userInfo]);
    }
}
