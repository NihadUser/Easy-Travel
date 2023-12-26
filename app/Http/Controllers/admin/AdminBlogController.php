<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Models\Comment;
use Illuminate\Http\Request;

class AdminBlogController extends Controller
{
    public function index()
    {
        $category = BlogCategory::all();
        $blogs = Blog::with('author')->paginate(5);
        return view('admin.blogs.index', compact(['category', 'blogs']));
    }
    public function blogAdd(Request $request)
    {
        $request->validate([
            'name' => ['required'],
            'short_description' => ['required'],
            'description' => ['required'],
            'category' => ['required'],
            'image' => ['required'],
        ]);
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $newFile = time() . "." . $extension;
            $file->move(public_path('/images/blogImgs'), $newFile);
        }
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
    public function category()
    {
        $category = BlogCategory::all();
        return view('admin.blogs.category.index', compact(['category']));
    }
    public function categoryAdd(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string']
        ]);
        $name = $request->name;
        $insert = BlogCategory::create([
            'name' => $name
        ]);
        if ($insert) {
            return back()->with('success', "Category added Blogs successfully");
        }
    }
    public function comments($id)
    {
        $comments = Comment::where('entity_type', 'blog')->where("entity_id", $id)->with('users')->get();
        return view('admin.blogs.comments.index', compact(['comments']));
    }
    public function editBlog($id)
    {
        $blog = Blog::with('author')->with('category')->where('id', $id)->first();
        $category = BlogCategory::all();
        return view('admin.blogs.edit', compact(['blog', 'category']));
    }
    public function blogEdit(Request $request, $id)
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
    public function categoryDelete($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();
        return back()->with('success', 'Category deleted successfully');
    }
}