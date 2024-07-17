<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\Admin\Place\Images\{IndexRequest, StoreRequest};
use App\Models\{Place, PlaceFiles};
use Illuminate\Contracts\View\{Factory, View};
use App\Traits\MediaTrait;

class PlaceImageController extends Controller
{
    use MediaTrait;
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
    public function store(StoreRequest $request): RedirectResponse
    {
        $images = [];

        foreach ($request->file('file') as $file) {
            $newFileName = $this->uploadImage($file, 'imgs');

            $images[] = [
                'image' => $newFileName,
                'place_id' => $request->get('id')
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
        $place_file = PlaceFiles::query()->with('place')->findOrFail($id);

        if ($place_file->delete()) {
            return back()->with('success', 'Image deleted successfully!');
        }
        return back()->with('fail', 'Something went wrong.');
    }
}
