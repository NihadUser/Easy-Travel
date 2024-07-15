<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\{Request, User, TourPlan};
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class AdminController extends Controller
{
    /**
     * @return Application|Factory|View
     */
    public function __invoke(): Factory|View|Application
    {
        $users_count = User::query()->count();
        $requests_count = Request::query()->count();
        $tours_count = TourPlan::query()->count();

        return view('admin.dashboard.index', compact(['users_count', 'requests_count', 'tours_count']));
    }

}
