<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Traits\MediaTrait;

class BlogController extends Controller
{
    use MediaTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = BlogCategory::all();
        $blogs = Blog::query()
            ->with('author')
            ->paginate(5);

        return view('admin.blogs.index', compact(['category', 'blogs']));
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
        $newFile = $this->uploadImage($request->file('image'), 'blogImgs');

        $insert = Blog::create([
            'name' => $request->name,
            'short_description' => $request->short_description,
            'description' => $request->description,
            'image' => $newFile,
            'category_id' => $request->category,
            'user_id' => auth()->id()
        ]);
        if ($insert) {
            return back()->with('success', 'Blog added successfully!');
        }
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
        $blog = Blog::with(['author', 'category'])->where('id', $id)->first();
        $category = BlogCategory::all();

        if(!$blog){
            return back()->with('error', 'Blog not found!');
        }
        return view('admin.blogs.edit', compact(['blog', 'category']));
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
        $blog = Blog::findOrFail($id);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $newFile = time() . "." . $extension;
            $file->move(public_path('/images/blogImgs'), $newFile);
        } else {
            $newFile = $blog->image;
        }
        $editArr = [
            'name' => $request->name,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'image' => $newFile,
            'category_id' => $request->category
        ];
        $edit = $blog->update($editArr);
        if ($edit) {
            return back()->with('success', "Blog edited successfully");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::query()->findOrFail($id);
        if(!$blog){
            return back()->with('error', 'Blog not found!');
        }
        $blog->delete();
        return back()->with('success', 'Blog deleted successfully!');
    }
}
