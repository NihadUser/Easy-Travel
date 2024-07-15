<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users.index', compact(['users']));
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.editRole', compact('user'));
    }
    public function update(Request $request, $id)
    {
        $role = $request->role;
        $user = User::findOrFail($id);
        $user->update([
            'role' => $role
        ]);
        return redirect()->route('admin.users.index')->with('success', 'Role updated successfully!');
    }
    public function block($id)
    {
        $user = User::findOrFail($id);
        $delete = $user->delete();
        if ($delete) {
            return redirect()->route('admin.users.index')->with('success', 'User blocked!');
        }
    }
    public function guideInfo($id)
    {
        $guide = User::findOrFail($id);
        $languages = json_decode($guide->guides->languages);
        $places = json_decode($guide->guides->aviable_for);
        if ($guide->role == 'guide') {
            return view('admin.users.guide', compact('guide', 'places', 'languages'));
        }
    }
}
