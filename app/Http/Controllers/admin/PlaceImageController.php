<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Place\Images\StoreRequest;
use App\Models\{Place, PlaceFiles};
use Illuminate\Support\Str;
use Illuminate\Contracts\View\{Factory, View};
use Illuminate\Http;
class PlaceImageController extends Controller
{
    /**
     * Summary of index
     * @param mixed $id
     * @return Factory|View
     */
    public function index($id): Factory|View
    {
        $files = PlaceFiles::where('place_id', $id)->get();

        $name = Place::where('id', $id)->first()->name;

        return view('admin.place.images', compact(['files', 'name', 'id']));
    }


    /**
     * @param StoreRequest $request
     * @param $id
     * @return Http\RedirectResponse
     */
    public function store(StoreRequest $request, $id): Http\RedirectResponse
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

        $insert = PlaceFiles::query()
            ->insert($images);

        if ($insert)
            return back()->with('success', 'Images uploaded successfully.');
        return back()->with('fail', 'Something went wrong.');
    }


    /**
     * @param $id
     * @param $image
     * @return Http\RedirectResponse
     */
    public function destroy($id, $image): Http\RedirectResponse
    {
        $delete = PlaceFiles::query()
            ->where('place_id', $id)
            ->where('id', $image)
            ->delete();

        if ($delete)
            return back()->with('success', 'Image deleted successfully!');
        return back()->with('fail', 'Something went wrong.');
    }
}
