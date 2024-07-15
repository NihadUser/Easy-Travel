<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Place\Images\{IndexRequest, StoreRequest};
use App\Models\{Place, PlaceFiles};
use Illuminate\Support\Str;
use Illuminate\Contracts\View\{Factory, View};

class PlaceImageController extends Controller
{
    /**
     * @param IndexRequest $request
     * @return Factory|View
     */
    public function index(IndexRequest $request): Factory|View
    {
        $place_id = $request->get('place_id');
        $files = PlaceFiles::query()->where('place_id', $place_id)->get();
        $name = Place::query()->where('id', $place_id)->first()->name;

        return view('admin.place.images', compact(['files', 'name', 'place_id']));
    }


    /**
     * @param StoreRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function store(StoreRequest $request, $id): RedirectResponse
    {
        $images = [];

        foreach ($request->file('file') as $file) {
            $extension = $file->getClientOriginalExtension();
            $newFileName = Str::uuid() . '.' . $extension;
            $file->move(public_path('/images/imgs'), $newFileName);

            $images[] = [
                'image' => $newFileName,
                'place_id' => $id
            ];
        }

        $insert = PlaceFiles::query()->insert($images);

        if ($insert) {
            return back()->with('success', 'Images uploaded successfully.');
        }
        return back()->with('fail', 'Something went wrong.');
    }


    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $place_file = PlaceFiles::query()->has('place')->findOrFail($id);

        if ($place_file->delete()) {
            return back()->with('success', 'Image deleted successfully!');
        }
        return back()->with('fail', 'Something went wrong.');
    }
}
