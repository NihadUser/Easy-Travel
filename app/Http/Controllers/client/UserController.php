<?php

namespace App\Http\Controllers\client;

use App\Models\GuideBook;
use App\Models\TourUser;
use Illuminate\Support\Carbon;
use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\BookProperty;
use App\Models\GuideInfo;
use App\Models\HostRequest;
use App\Models\Request;
use App\Models\TourPlan;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    public function index($id)
    {
        $today = Carbon::now();
        $todayFormatted = $today->toDateString();
        $day = explode('-', $todayFormatted);
        $aviable_for = null;
        $languages = null;
        $bookings = BookProperty::where('user_id', $id)->with('hotel')->get();
        $guideBookings = GuideBook::where('user_id', $id)->get();
        $tour = TourUser::where('user_id', $id)->with('active')->get();
        $guideBookings = GuideBook::where('user_id', $id)->with('guide')->get();
        $bookings = BookProperty::where('user_id', $id)->with('hotel')->get();
        $activeHotels = [];
        $pastHotels = [];
        $activeGuides = [];
        $pastGuides = [];
        $pastTour = [];
        $activeTour = [];
        foreach ($tour as $item) {
            if ($item->active->is_active == 1) {
                $activeTour[] = $item;
            }
            if ($item->active->is_active == 0) {
                $pastTour[] = $item;
            }
        }
        foreach ($guideBookings as $item) {
            $guideEndTime = $item->end_date;
            $finish = explode('-', $guideBookings);
            if ($day[2] == $finish[2]) {
                $booking = GuideBook::findOrFail($item->id);
                $booking->update([
                    'is_active' => 1
                ]);
            }
        }
        foreach ($bookings as $item) {
            $bookingEndTime = $item->end_time;
            $end = explode("-", $bookingEndTime);
            if ($day[2] == $end[2]) {
                $update = BookProperty::findOrFail($item->id);
                $update->update([
                    'is_active' => 1
                ]);
            }
        }
        foreach ($guideBookings as $item) {
            if ($item->is_active == 0) {
                $activeGuides[] = $item;
            }
            if ($item->is_active == 1) {
                $pastGuides[] = $item;
            }
        }
        foreach ($bookings as $item) {
            if ($item->is_active == 0) {
                $activeHotels[] = $item;
            }
            if ($item->is_active == 1) {
                $pastHotels[] = $item;
            }
        }
        if (auth()->user()->role == 'guide') {
            $user = User::with('guides')->with('blogs')->where('id', auth()->id())->where('role', 'guide')->first();
            $language = $user->guides->languages;
            $languages = json_decode($language, true);
            $aviable = $user->guides->aviable_for;
            $aviable_for = json_decode($aviable);
        } elseif (auth()->user()->role == 'user') {
            $user = User::findOrFail($id);
        } elseif (auth()->user()->role == 'host') {
            $user = User::findOrFail($id);

        }
        $requests = User::with('requests')->where('id', $id)->first();
        $request = $requests->requests;
        $image = $user->image;
        if ($user->role == 'host') {
            $tour = TourPlan::where('host_id', auth()->id())->get();
        }
        $title = $user->name;
        if ($aviable_for && $aviable_for != null && $languages && $languages != null) {
            return view('client.userPage.index', compact(['user', 'title', 'request', 'image', 'pastGuides', 'activeGuides', 'activeHotels', 'pastHotels', 'activeTour', 'pastTour', 'aviable_for', 'languages']));
        } elseif ($user->role == 'host') {
            return view('client.userPage.index', compact(['user', 'title', 'request', 'activeGuides', 'tour', 'pastGuides', 'activeHotels', 'pastHotels', 'activeTour', 'pastTour']));
        } else {
            return view('client.userPage.index', compact(['user', 'title', 'request', 'activeGuides', 'activeHotels', 'pastGuides', 'pastHotels', 'activeTour', 'pastTour']));
        }
    }
    public function request($id)
    {
        $insert = Request::create([
            'user_id' => auth()->user()->id
        ]);
        if ($insert) {
            return back()->with('success', 'Your request has accepted successfully!');
        }
    }
    public function editProfile(\Illuminate\Http\Request $request, $id)
    {
        $user = User::findOrFail($id);
        $password = $user->password;
        $request->validate([
            'name' => ['required'],
            'location' => ['required'],
            'email' => ['required'],
        ]);
        if ($request->hasFile('image')) {
            $file = request()->file('image');
            $extension = $file->getClientOriginalExtension();
            $newFile = time() . "." . $extension;
            $file->move(public_path('/images/userImgs'), $newFile);
        } else {
            $newFile = $user->image;
        }

        $user->update([
            'name' => $request->name,
            'location' => $request->location,
            'email' => $request->email,
            'image' => $newFile,
            'password' => $password,
        ]);
        return back()->with('success', 'User informations changed successfully!');
    }
    public function guide(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'price' => ['required', 'min:0', 'integer'],
            'language' => ['required'],
            'aviable' => ['required'],
            'about' => ['required'],
        ]);
        $price = $request->price;
        $language = json_encode($request->language);
        $aviable = json_encode($request->aviable);
        $about = $request->about;
        $insert = GuideInfo::create([
            'price' => $price,
            'languages' => $language,
            'aviable_for' => $aviable,
            'about' => $about,
            'user_id' => auth()->id()
        ]);
        $user = User::findOrFail(auth()->id());
        $guide = 'guide';
        $user->update([
            'role' => $guide
        ]);
        $request = Request::where('user_id', auth()->id())->first()->delete();
        if ($insert && $request) {
            return back()->with('success', "You have been guide!");
        }
    }
    public function editGuide(\Illuminate\Http\Request $request, $id)
    {
        $guide = User::findOrFail($id);
        $guideInfo = GuideInfo::where('user_id', $id)->first();
        $request->validate([
            'name' => ['required'],
            'location' => ['required'],
            'email' => ['required'],
            'about' => ['required'],
            'aviable' => ['required'],
            'language' => ['required'],
            'price' => ['required'],
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $newFile = time() . "." . $extension;
            $file->move(public_path('/images/userImgs'), $newFile);
        } else {
            $newFile = $guide->image;
        }
        $user = [
            'name' => $request->name,
            'location' => $request->location,
            'image' => $newFile,
            'email' => $request->email
        ];
        $language = json_encode($request->language);
        $aviable = json_encode($request->aviable);
        $guideArr = [
            'about' => $request->about,
            'aviable_for' => $aviable,
            'languages' => $language,
            'price' => $request->price,
            'user_id' => $id
        ];
        if ($user && $guideArr) {
            $guide->update($user);
            $guideInfo->update($guideArr);
            return back()->with('success', 'Your informations changed successfully');
        }

    }
    public function host($id)
    {
        $request = Request::create([
            'type' => 'host',
            'user_id' => $id
        ]);
        if ($request) {
            return back()->with('success', 'Your request to be host has accepted !');
        }
    }
    public function userBlogEdit($id)
    {
        $blogs = Blog::with('author')->where('user_id', $id)->get();
        $categories = BlogCategory::all();
        $title = 'Edit Blog';
        return view('client.userPage.editBlog', compact(['blogs', 'title', 'categories']));
    }
    public function editedBlog(\Illuminate\Http\Request $request, $id)
    {
        $blog = Blog::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $newFile = time() . "." . $extension;
            $file->move(public_path('/images/blogImgs'), $newFile);
        } else {
            $newFile = $blog->image;
        }
        $editedArr = [
            'name' => $request->blogName,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $newFile,
            'category_id' => $blog->category_id,
        ];
        $blog->update($editedArr);
        return back()->with('success', 'Your blog updated successfully!');
    }
    public function editPage($id)
    {
        $blog = Blog::findOrFail($id);
        $title = "Edit" . $blog->name;
        return view('client.userPage.editPage', compact(['title', 'blog']));
    }
    public function deleteBlog($id)
    {
        $blog = Blog::findOrFail($id);
        if ($blog != null) {
            $blog->delete();
            return back()->with('success', 'Blog deleted successfully');
        }
    }
    public function tourEdit($id)
    {
        $blog = TourPlan::findOrFail($id);
        $title = "Edit Tour";
        return view('client.userPage.editTour', compact('blog', 'title'));
    }
    public function tourPage($id)
    {
        // if (auth()->user()->role == 'host') {
        $tour = TourPlan::where('host_id', $id)->get();
        // return $tour;
        $title = "Tours";
        return view('client.userPage.tourPage', compact('tour', 'title'));
        // }
    }
    public function tour_edit(\Illuminate\Http\Request $request, $id)
    {
        $tour = TourPlan::findOrFail($id);
        $request->validate([
            'tourName' => ['string', 'required'],
            'tourPrice' => ['integer', 'required'],
            'people' => ['integer', 'required'],
            'startTime' => ['required'],
            'endTime' => ['required'],
            'about' => ['required'],
            'location' => ['required'],
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $newFile = time() . "." . $extension;
            $file->move(public_path('/images/tourImgs/'), $newFile);
        } else {
            $newFile = $tour->image;
        }
        $editedArr = [
            'name' => $request->tourName,
            'about' => $request->about,
            'price' => $request->tourPrice,
            'start_location' => $request->location,
            'start_time' => $request->startTime,
            'end_time' => $request->endTime,
            'people' => $request->people,
            'image' => $newFile,
        ];
        $tour->update($editedArr);
        return back()->with('success', 'Tour Updated Successful!');
    }
    public function deleteTour($id)
    {
        $tour = TourPlan::findOrFail($id)->delete();
        return back()->with('success', "Tour deleted successfully");
    }
}