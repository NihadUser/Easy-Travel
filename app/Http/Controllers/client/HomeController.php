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

        if (auth()->user() && auth()->user() != null)
            $image = User::findOrFail(auth()->id())->image;

        $guide = User::with('guides')
            ->with('comments')
            ->with('selections')
            ->where('role', 'guide')
            ->skip(0)->take(6)
            ->get();

        $places = Place::query()
            ->with('comments')
            ->with('selections')
            ->from('places as p')
            ->select('p.*', 'pf.image as image')
            ->join('place_files as pf', 'pf.place_id', '=', 'p.id')
            ->where('pf.show_home', 1)
            ->skip(0)->take(4)
            ->get();

        $properties = Property::query()
            ->with(['comments', 'selections', 'image'])
            ->skip(0)->take(4)
            ->get();

        $tours = TourPlan::where('is_active', 1)->get();

        if (auth()->user() && auth()->user() != null) {
            return view('client.home.index', compact(['places', 'title', 'properties', 'image', 'guide', 'tours']));
        } else {
            return view('client.home.index', compact(['places', 'properties', 'guide', 'tours', 'title']));
        }

    }

}
