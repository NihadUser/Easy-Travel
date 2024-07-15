<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use App\Models\BookProperty;
use App\Models\Comment;
use App\Models\Place;
use App\Models\PlaceFiles;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use App\Models\Property;
use App\Models\PropertyFile;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public function place($id)
    {
        $details = Place::findOrFail($id);
        $images = PlaceFiles::where('place_id', $id)->get();
        $recommendedPlaces = Place::inRandomOrder()->limit(4)->get();
        $recGuide = User::with('guides')->where('role', 'guide')->inRandomOrder()->limit(3)->get();
        $safety = "";
        $fun = "";
        $title = $details->name;

        if ($details->safety >= 0 && $details->safety <= 20) {
            $safety = "Bad";
        } elseif ($details->safety >= 21 && $details->safety <= 40) {
            $safety = "Not bad";
        } elseif ($details->safety >= 41 && $details->safety <= 60) {
            $safety = "Normal";
        } elseif ($details->safety >= 61 && $details->safety <= 80) {
            $safety = "Good";
        } else {
            $safety = "Great";
        }
        if ($details->fun >= 0 && $details->fun <= 20) {
            $fun = "Bad";
        } elseif ($details->fun >= 21 && $details->fun <= 40) {
            $fun = "Not bad";
        } elseif ($details->fun >= 41 && $details->fun <= 60) {
            $fun = "Normal";
        } elseif ($details->fun >= 61 && $details->fun <= 80) {
            $fun = "Good";
        } else {
            $fun = "Great";
        }
        if (auth()->user() && auth()->user() != null) {
            $image = User::findOrFail(auth()->id())->image;
        }
        $comments = Comment::with('users')->where('entity_id', $id)->where('entity_type', 'place')->get();
        if (auth()->user() && auth()->user() != null) {
            return view('client.details.place.index', compact(['details', 'title', 'image', 'safety', 'images', 'comments', 'recGuide', 'recommendedPlaces', "fun"]));
        } else {
            return view('client.details.place.index', compact(['title', 'details', 'safety', 'images', 'comments', 'recGuide', 'recommendedPlaces', "fun"]));
        }

    }
    public function property($id)
    {
        $element = Property::findOrFail($id);
        $extra = $element->extras;
        $extras = json_decode($extra, true);

        $images = PropertyFile::query()
            ->where('property_id', $id)
            ->get();

        $comments = Comment::with('users')
            ->where('entity_id', $id)
            ->where('entity_type', 'property')->
            get();

        $recoProperty = Property::inRandomOrder()
            ->limit(4)
            ->get();

        $title = $element->name;

        $recGuide = User::query()
            ->with('guides')
            ->where('role', 'guide')
            ->inRandomOrder()
            ->limit(3)
            ->get();

        if (auth()->user() && auth()->user() != null) {

            $bookedProperty = BookProperty::query()
                ->where('user_id', auth()->id())
                ->where('is_active', 0)
                ->where('hotel_id', $id)
                ->get();

            // return $bookedProperty;
            $image = User::findOrFail(auth()->id())->image;

            return view('client.details.property.index', compact(['element', 'title', 'recoProperty', 'image', 'bookedProperty', 'extras', 'recGuide', 'comments', 'images']));
        }

        $bookedProperty = null;

        return view('client.details.property.index', compact(['element', 'title', 'recoProperty', 'extras', 'recGuide', 'comments', 'images', 'bookedProperty']));

    }
    public function guide($id)
    {
        $guide = User::with("guides")->where('id', $id)->first();
        if (auth()->user() && auth()->user() != null) {
            $image = User::findOrFail(auth()->id())->image;
        }
        $language = $guide->guides->languages;
        $languages = json_decode($language, true);
        $availble = $guide->guides->aviable_for;
        $availble_for = json_decode($availble, true);
        $guides = User::with('guides')->where('role', 'guide')->skip(0)->take(3)->get();
        $places = Place::inRandomOrder()->limit(4)->get();
        $comments = Comment::with('users')->where('entity_id', $id)->where('entity_type', 'guide')->get();
        $title = $guide->name;
        if (auth()->user() && auth()->user() != null) {
            return view('client.details.guide.index', compact(['image', 'title', 'guide', 'languages', 'availble_for', 'comments', 'places', 'guides']));
        } else {
            return view('client.details.guide.index', compact(['guide', 'title', 'languages', 'availble_for', 'comments', 'places', 'guides']));
        }
    }
}
