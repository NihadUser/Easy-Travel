<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Property\Image\{IndexRequest, StoreRequest};
use App\Models\{Property, PropertyFile};
use Illuminate\Http\{Request, RedirectResponse};
use App\Traits\MediaTrait;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\{Factory, View};

class PropertyImageController extends Controller
{
    use MediaTrait;

    /**
     * @param IndexRequest $request
     * @return Application|Factory|View
     */
    public function index(IndexRequest $request): Application|Factory|View
    {
        $property_id = $request->get('property_id');
        $files = PropertyFile::query()->where('property_id', $property_id)->where('show_home', 0)->get();
        $name = Property::query()->findOrFail($property_id)->name;

        return view('admin.property.image', compact(['files', 'property_id', 'name']));
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
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $imageArr = [];
        foreach ($request->file('file') as $file) {
            $newFile = $this->uploadImage($file, 'imgs');

            $imageArr[] = [
                'property_id' => $request->get('property_id'),
                'image' => $newFile
            ];
        }
        $create = PropertyFile::query()->insert($imageArr);

        if ($create) {
            return back()->with('success', "Images added successsfully");
        }

        return back()->with('error', "Please fill all inputs");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $item = PropertyFile::query()->findOrFail($id);
        $delete = $item->delete();
        if ($delete) {
            return back()->with('success', "Image deleted successfully");
        }
        return back()->with('error', "Please fill all inputs");
    }
}
