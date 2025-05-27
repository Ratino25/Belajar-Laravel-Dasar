<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SessionController extends Controller
{
    public function createSession(Request $request): string
    {
        $request->session()->put("userId", "Ratino");
        $request->session()->put("isMember", true);
        return "Ok";
    }

    public function getSession(Request $request): string
    {
        $userId = $request->session()->get("userId", "guest");
        $isMemberr = $request->session()->get("isMember", "false");

        return "User Id : ${userId }, Is Member : ${isMemberr}";
    }
}
