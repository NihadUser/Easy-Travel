<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\HostRequest;
use App\Models\Request;
use App\Models\TourPlan;
use App\Models\User;
use Illuminate\Support\Facades\Route;

class RequestController extends Controller
{
    public function index()
    {
        $requests = Request::all();
        $usersArr = Request::with('users')->get();
        $users = [];
        foreach ($usersArr as $item) {
            $user = $item->users;
            $users[] = $user;
        }
        $r_count = Request::all();
        $count = count($r_count);
        $tour = HostRequest::with('tour')->with('user')->get();
        return view('admin.requests.index', compact(['users', 'requests', 'usersArr', 'tour', 'count']));
    }
    public function tourDetails($id)
    {
        $tour = TourPlan::findOrFail($id);
        $places = json_decode($tour->travel_places);
        $transport = json_decode($tour->transport);
        return view('admin.requests.details', compact(['tour', 'places', 'transport']));
    }
    public function approve2($id)
    {
        $request = Request::where('id', $id)->first();
        $type = 'guide';
        $request->update([
            'type' => $type,
        ]);
        return back()->with("success", 'You give permission to become guide');
    }
    public function approve($id)
    {
        $user = User::where('id', $id)->with('requests')->first();
        $rId = $user->requests->id;
        $request = Request::findOrFail($rId);
        $user->update([
            'role' => "host"
        ]);
        $request->delete();
        if ($user && $request) {
            return back()->with('success', 'User role has uptaded to host');
        }
    }
    public function tourApprove($id)
    {
        $request = HostRequest::where('tours_id', $id)->first();
        $request->update([
            'type' => 'approveTour'
        ]);
        return redirect()->route('admin.requests.request')->with('success', 'You give the permission to create tour');
    }
    public function delete($id)
    {
        $delete = Request::findOrFail($id);
        $delete->delete();
        return back()->with('success', 'Request refused successfully');
    }
    public function tourDelete($id)
    {
        $delete = HostRequest::where('tours_id', $id)->first();
        $delete->delete();
        return back()->with('success', 'Tour deleted successfully!!');
    }

}