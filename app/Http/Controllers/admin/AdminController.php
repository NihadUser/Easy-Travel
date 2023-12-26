<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BookProperty;
use App\Models\GuideBook;
use App\Models\TourPlan;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        $requests = \App\Models\Request::all();
        $tours = TourPlan::where('is_active', 1)->get();
        $tour = count($tours);
        $request = count($requests);
        $user = count($users);
        return view('admin.dashboard.index', compact(['user', 'request', 'tour']));
    }
    public function bookings()
    {
        $guide = GuideBook::with('user')->with('guide')->get();
        $property = BookProperty::with('hotel')->with('person')->get();
        // return $guide;
        return view('admin.bookings.index', compact('guide', 'property'));
    }
}