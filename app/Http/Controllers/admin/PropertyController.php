<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Property\{StoreRequest, UpdateRequest};
use App\Models\{Property, PropertyFile, PropertySupply, Supply};
use Illuminate\Http\{Request, RedirectResponse};
use Illuminate\Contracts\Foundation\{Application};
use Illuminate\Contracts\View\{Factory, View};
use App\Traits\{MediaTrait};


class PropertyController extends Controller
{
    use MediaTrait;
    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
    {
        $place = Property::query()
            ->with('image')
            ->paginate(6);

        $supplies = Supply::query()->get();

        return view('admin.property.index', compact(['place', 'supplies']));
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
        $newFile = $this->uploadImage($request->file('image'), 'imgs');

        $property = Property::create(
            $request->validated()
        );

        PropertyFile::query()
            ->create([
                'image' => $newFile,
                'show_home' => 1,
                'property_id' => $property->id
            ]);

        $supplArr = [];
        foreach ($request->supplies as $item)
        {
            $supplArr[] = [
                'property_id' => $property->id,
                'supply_id' => $item,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }

        PropertySupply::query()->insert($supplArr);

        return back()->with('success', "Data Uploaded Successfully");
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
     * @param $id
     * @return Application|Factory|View
     */
    public function edit($id): Application|Factory|View
    {
        $item = Property::query()->with('supplies')
            ->from('properties as p')
            ->select("p.*", "pf.image as image", "pf.id as imageId")
            ->join('property_files as pf', 'pf.property_id', '=', 'p.id')
            ->where('pf.show_home', 1)
            ->where('p.id', $id)
            ->first();

        $supplies  = Supply::query()->get();

        return view('admin.property.edit', compact('item', 'supplies'));
    }

    /**
     * @param UpdateRequest $request
     * @param $id
     * @return RedirectResponse
     */
    public function update(UpdateRequest $request, $id): RedirectResponse
    {
        $property = Property::query()->findOrFail($id);

        $image = PropertyFile::query()
            ->where('property_id', $id)
            ->where('show_home', 1)
            ->first()->image;

        if ($request->hasFile('image')) {
            $image = $this->uploadImage($request->file('image'), 'imgs');
        }

        $property->update($request->validated());

        PropertyFile::query()
            ->where('property_id', $id)
            ->where('show_home', 1)
            ->update([
                'image' => $image,
            ]);

        PropertySupply::query()
            ->where('property_id', $id)
            ->delete();

        $supplyArr = [];
        foreach ($request->supplies as $item)
        {
            $supplyArr[] = [
                'supply_id' => $item,
                'property_id' => $id,
                'created_at' => now(),
                'updated_at' => now()
            ];
        }
        PropertySupply::query()->insert($supplyArr);

        return back()->with('success', 'Updated successfully');
    }

    /**
     * @param $id
     * @return RedirectResponse
     */
    public function destroy($id): RedirectResponse
    {
        $delete = Property::query()->findOrFail($id);

        if(!$delete){
            return back()->with('error', "Data Not Found");
        }

        $delete->delete();
        return back()->with('success', 'Deleted Successfully');
    }
}
