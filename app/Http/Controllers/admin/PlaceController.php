<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Place;
use Exception;
use Illuminate\Http\{Response, Request, RedirectResponse};
use App\Http\Requests\Admin\Place\{StoreRequest};
use Illuminate\Contracts\View\{Factory, View};
use App\Traits\MediaTrait;

class PlaceController extends Controller
{
    use MediaTrait;
    /**
     * Display a listing of the resource.
     *
     * @return Response|Factory|View
     */
    public function index(): Response|Factory|View
    {
        $place = Place::query()->select('id', 'name', 'price', 'image', 'location')->fastPaginate(5);
        return view('admin.place.index', compact(['place']));
    }

    /**
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            $insert = $request->validated();
            $insert['image'] =  $this->uploadImage($request->file('image'), 'imgs');
            Place::query()->create($insert);

            return back()->with('success', 'Created Successfully');
        } catch (Exception) {
            return back()->with('fail', 'Something went wrong');
        }
    }

    /**
     * Summary of edit
     * @param mixed $place
     * @return Factory|View
     */
    public function edit($place): Factory|View
    {
        $place = Place::query()->findOrFail($place);

        if(!$place)
            to_route('admin.notfound');

        return view('admin.place.editPlace', compact(['place']));
    }

    /**
     * Summary of update
     * @param \Illuminate\Http\Request $request
     * @param mixed $place
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $place): RedirectResponse
    {
        $editedPlace = Place::findOrFail($place);

        $img = $editedPlace->image;

        if ($request->hasFile('image')) {

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $newFile = time() . "." . $extension;
            $file->move(public_path('images/imgs'), $newFile);
        }

        $newFile = $img;

        $editArr = [
            'name' => $request->name,
            'about' => $request->about,
            'price' => $request->price,
            'location' => $request->location,
            'safety' => $request->safety,
            'fun' => $request->fun,
            'internet' => $request->internet,
            'image' => $newFile,
        ];

        $update = $editedPlace->update($editArr);
        if ($update)
            return back()->with('success', 'Place edited successfully');

        return back()->with('error', 'Something went wrong');
    }

    /**
     * Summary of destroy
     * @param mixed $place
     * @return RedirectResponse
     */
    public function destroy($place): RedirectResponse
    {
        $delete = Place::findOrFail($place)->delete();

        if($delete)
            return back()->with('success', 'Place deleted successfully');

        return back()->with('error', 'Something went wrong');
    }
}
