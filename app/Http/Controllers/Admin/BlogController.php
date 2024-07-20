<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Blog\{StoreRequest, UpdateRequest};
use App\Models\{Blog, BlogCategory};
use Illuminate\Http\{Request,RedirectResponse};
use App\Traits\MediaTrait;
use Illuminate\Contracts\View\{View, Factory};
use Illuminate\Contracts\Foundation\Application;

class BlogController extends Controller
{
    use MediaTrait;

    /**
     * @return Application|Factory|View
     */
    public function index(): Application|Factory|View
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
     * @param StoreRequest $request
     * @return RedirectResponse
     */
    public function store(StoreRequest $request)
    {
        $newFile = $this->uploadImage($request->file('image'), 'blogImgs');

        $insert = Blog::query()->create([
            'name' => $request->name,
            'description' => $request->description,
            'short_description' => $request->short_description,
            'image' => $newFile,
            'category_id' => $request->category
        ]);
        if ($insert) {
            return back()->with('success', 'Blog added successfully!');
        }
        return back()->with('error', 'Something went wrong!');
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
        $blog = Blog::query()->with(['author', 'category'])->where('id', $id)->first();
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
    public function update(UpdateRequest $request, $id)
    {
        $blog = Blog::query()->findOrFail($id);
        if ($request->hasFile('image')) {
            $newFile = $this->uploadImage($request->file('image'), 'blogImgs');
        }

        $newFile = $blog->image;

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
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
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
