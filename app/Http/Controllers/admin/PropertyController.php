<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\PropertyFile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function property()
    {
        $place = Property::paginate(3);
        $select3 = 'selected';
        return view('admin.property.index', compact(['place', 'select3']));
    }
    public function propetyInsert(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'description' => ['required'],
            'stars' => ['required'],
            'location' => ['required'],
            'price' => ['required'],
            'bed_count' => ['required'],
            'bath_count' => ['required'],
            'sqft_count' => ['required'],
            'image' => ['required'],
        ]);
        if ($request->wifi) {
            $wifi = 'true';
        } else {
            $wifi = 'false';
        }
        if ($request->tv) {
            $tv = 'true';
        } else {
            $tv = 'false';
        }
        if ($request->free_parking) {
            $free_parking = 'true';
        } else {
            $free_parking = 'false';
        }
        if ($request->air_conditioner) {
            $air_conditioner = 'true';
        } else {
            $air_conditioner = 'false';
        }
        if ($request->pool) {
            $pool = 'true';
        } else {
            $pool = 'false';
        }
        if ($request->gym) {
            $gym = 'true';
        } else {
            $gym = 'false';
        }
        if ($request->kitchen) {
            $kitchen = 'true';
        } else {
            $kitchen = 'false';
        }
        if ($request->long_term) {
            $long_term = 'true';
        } else {
            $long_term = 'false';
        }
        if ($request->elevator) {
            $elevator = 'true';
        } else {
            $elevator = 'false';
        }
        if ($request->refrigerator) {
            $refrigerator = 'true';
        } else {
            $refrigerator = 'false';
        }
        if ($request->pet_allowed) {
            $pet_allowed = 'true';
        } else {
            $pet_allowed = 'false';
        }
        if ($request->washing_machine) {
            $washing_machine = 'true';
        } else {
            $washing_machine = 'false';
        }
        $extra = [
            'wifi' => $wifi,
            'tv' => $tv,
            'free_parking' => $free_parking,
            'air_conditioner' => $air_conditioner,
            'pool' => $pool,
            'gym' => $gym,
            'kitchen' => $kitchen,
            'long_term_stay' => $long_term,
            'elevator' => $elevator,
            'refrigerator' => $refrigerator,
            'pet_allowed' => $pet_allowed,
            'washing_machine' => $washing_machine
        ];
        $extraJson = json_encode($extra);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $newFile = time() . "." . $extension;
        }
        $insert = Property::create([
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'stars' => $request->stars,
            'price' => $request->price,
            'bed_count' => $request->bed_count,
            'bath_count' => $request->bath_count,
            'sqft_count' => $request->sqft_count,
            'image' => $newFile,
            'extras' => $extraJson
        ]);
        $file->move(public_path('/images/imgs'), $newFile);
        if ($insert) {
            return back()->with('success', "Data Uploaded Successfully");
        }
    }
    public function propetyDelete($id)
    {
        $delete = Property::findOrFail($id);
        $delete->delete();
        return back()->with('success', 'Deleted Successfully');
    }
    public function edit($id)
    {
        $item = Property::findOrFail($id);
        $extras = $item->extras;
        $extra = json_decode($extras);
        return view('admin.property.edit', compact('item', 'extra'));
    }
    public function upload(Request $request, $id)
    {
        $item = Property::findOrFail($id);
        $img = $item->image;
        if ($request->wifi) {
            $wifi = 'true';
        } else {
            $wifi = 'false';
        }
        if ($request->tv) {
            $tv = 'true';
        } else {
            $tv = 'false';
        }
        if ($request->free_parking) {
            $free_parking = 'true';
        } else {
            $free_parking = 'false';
        }
        if ($request->air_conditioner) {
            $air_conditioner = 'true';
        } else {
            $air_conditioner = 'false';
        }
        if ($request->pool) {
            $pool = 'true';
        } else {
            $pool = 'false';
        }
        if ($request->gym) {
            $gym = 'true';
        } else {
            $gym = 'false';
        }
        if ($request->kitchen) {
            $kitchen = 'true';
        } else {
            $kitchen = 'false';
        }
        if ($request->long_term) {
            $long_term = 'true';
        } else {
            $long_term = 'false';
        }
        if ($request->elevator) {
            $elevator = 'true';
        } else {
            $elevator = 'false';
        }
        if ($request->refrigerator) {
            $refrigerator = 'true';
        } else {
            $refrigerator = 'false';
        }
        if ($request->pet_allowed) {
            $pet_allowed = 'true';
        } else {
            $pet_allowed = 'false';
        }
        if ($request->washing_machine) {
            $washing_machine = 'true';
        } else {
            $washing_machine = 'false';
        }
        $extra = [
            'wifi' => $wifi,
            'tv' => $tv,
            'free_parking' => $free_parking,
            'air_conditioner' => $air_conditioner,
            'pool' => $pool,
            'gym' => $gym,
            'kitchen' => $kitchen,
            'long_term_stay' => $long_term,
            'elevator' => $elevator,
            'refrigerator' => $refrigerator,
            'pet_allowed' => $pet_allowed,
            'washing_machine' => $washing_machine
        ];
        $extras = json_encode($extra);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $newFile = time() . "." . $extension;
            $file->move(public_path('/images/imgs'), $newFile);
        } else {
            $newFile = $img;
        }
        $editedArr = [
            'name' => $request->name,
            'description' => $request->description,
            'location' => $request->location,
            'stars' => $request->stars,
            'price' => $request->price,
            'bed_count' => $request->bed_count,
            'bath_count' => $request->bath_count,
            'sqft_count' => $request->sqft_count,
            'image' => $newFile,
            'extras' => $extras
        ];
        $item->update($editedArr);
        return back()->with('success', 'Updated successfully');
    }
    public function image($id)
    {
        $files = PropertyFile::where('property_id', $id)->get();
        $name = Property::findOrFail($id)->name;
        return view('admin.property.image', compact(['files', 'id', 'name']));
    }
    public function insert(Request $request, $id)
    {
        $validation = $request->validate([
            'file' => ['required', 'array'],
            'file.*' => ['required'],
        ]);
        if ($validation) {
            foreach ($request->file('file') as $file) {
                $extension = $file->getClientOriginalExtension();
                $newFile = Str::uuid() . "." . $extension;
                $file->move(public_path('/images/imgs'), $newFile);
                $create = PropertyFile::create([
                    'image' => $newFile,
                    'property_id' => $id
                ]);
            }
            if ($create) {
                return back()->with('success', "Images added successsfully");
            }
        } else {
            return back()->with('error', "Please fill all inputs");
        }
    }
    public function deleteImage($id)
    {
        $item = PropertyFile::findOrFail($id);
        $delete = $item->delete();
        if ($delete) {
            return back()->with('success', "Image deleted successfully");
        }
    }
}