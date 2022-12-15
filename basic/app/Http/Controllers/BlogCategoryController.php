<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogCategory;

class BlogCategoryController extends Controller
{
    public function AllBlogCategory() {
        $blogCategory = BlogCategory::latest()->get();
        return view('admin.blog_category.blogCategory_all', compact('blogCategory'));
    }

    public function AddBlogCategory() {

        return view('admin.blog_category.add_blogCategory');

    }

    public function StoreBlogCategory(Request $request) {

       

        BlogCategory::insert([
            'blog_category' => $request->blog_category,               

        ]); 

        $notification = array(
        'message' => 'Blog Category Inserted Successfully', 
        'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);

    }

    public function EditBlogCategory($id) {

        $blogCategory = BlogCategory::findOrFail($id);
        return view('admin.blog_category.edit_blogCategory', compact('blogCategory'));

    }

    public function UpdateBlogCategory(Request $request, $id) {

        BlogCategory::findOrFail($id)->update([
            'blog_category' => $request->blog_category,               

        ]); 

        $notification = array(
        'message' => 'Blog Category Updated Successfully', 
        'alert-type' => 'success'
        );

        return redirect()->route('all.blog.category')->with($notification);

    }

    public function DeleteBlogCategory($id) {

        BlogCategory::findOrFail($id)->delete(); 

        $notification = array(
        'message' => 'Blog Category Deleted Successfully', 
        'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }




}
