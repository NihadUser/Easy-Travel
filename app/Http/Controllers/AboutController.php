<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class AboutController extends Controller
{
    public function index()
    {
        $title = 'About Us';
        return view("client.aboutPage.index", compact("title"));
    }

    // public function functionName(Request $request) {
    //     $users = User::query();

    //     $users = $this->filterIndex($request, $users);

    //     $users = $users->get();
    // }

    // private function filterIndex(Request $request, $users)
    // {
    //     if ($request->name) {
    //         $users = $users->where();
    //     }
    //     if ($request->name) {
    //         $users = $users->where();
    //     }
    //     if ($request->name) {
    //         $users = $users->where();
    //     }
    //     if ($request->name) {
    //         $users = $users->where();
    //     }

    //     return $users;
    // }
}