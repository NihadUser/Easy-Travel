<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\Place;
use App\Models\Property;
use App\Models\TourPlan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class HomeController extends Controller
{
    public function index()
    {
        $title = 'Home';
        if (auth()->user() && auth()->user() != null) {
            $image = User::findOrFail(auth()->id())->image;
        }
        $guide = User::with('guides')->with('comments')->with('selections')->where('role', 'guide')->skip(0)->take(6)->get();
        $places = Place::with('comments')->with('selections')->skip(0)->take(4)->get();
        $properties = Property::with('comments')->with('selections')->skip(0)->take(4)->get();
        $tours = TourPlan::where('is_active', 1)->get();
        if (auth()->user() && auth()->user() != null) {
            return view('client.home.index', compact(['places', 'title', 'properties', 'image', 'guide', 'tours']));
        } else {
            return view('client.home.index', compact(['places', 'properties', 'guide', 'tours', 'title']));
        }

    }

}