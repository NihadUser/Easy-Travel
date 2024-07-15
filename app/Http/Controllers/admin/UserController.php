<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\{Request, RedirectResponse};
use Illuminate\Contracts\View\{View,Factory};
use Illuminate\Contracts\Foundation\Application;
use App\Traits\Messages;

class UserController extends Controller
{
    use Messages;
    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $users = User::query()->paginate(10);

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function show($id): Application|Factory|View|RedirectResponse
    {
        $guide = User::query()->findOrFail($id);
        $languages = json_decode($guide->guides->languages);
        $places = json_decode($guide->guides->aviable_for);

        if ($guide->role == 'guide') {
            return view('admin.users.guide', compact('guide', 'places', 'languages'));
        }
        return back()->with('error', self::$WRONG);
    }

    /**
     * @param $id
     * @return Application|Factory|View|RedirectResponse
     */
    public function edit($id): Application|Factory|View|RedirectResponse
    {
        $user = User::query()->findOrFail($id);
        if(!$user)
            return back()->with('error', self::$USER_NOT_FOUND);

        return view('admin.users.editRole', compact('user'));
    }

    /**
     * @param Request $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(Request $request, $id): RedirectResponse
    {
        $user = User::query()->findOrFail($id);

        if(!$user)
            return back()->with('error', self::$USER_NOT_FOUND);

        $user->update([
            'role' => $request->role
        ]);

        return redirect()->route('admin.users.index')->with('success', self::$ROLE_UPDATED);
    }

    /**
     * @param $id
     * @return RedirectResponse|void
     */
    public function destroy($id)
    {
        $user = User::query()->findOrFail($id);

        if(!$user)
            return back()->with('error', self::$USER_NOT_FOUND);

        $delete = $user->delete();

        if ($delete) {
            return redirect()->route('admin.users.index')->with('success', self::$USER_BLOCKED);
        }
        return back()->with('error', self::$WRONG);
    }
}
