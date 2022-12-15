<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\BlogCategory;
use Image; 
use Illuminate\Support\Carbon;

class BlogController extends Controller
{
    public function AllBlog() {

        $blogs = Blog::latest()->get();
        return view('admin.blogs.all_blogs', compact('blogs'));

    }

    public function AddBlog() {

        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.add_blogs', compact('categories'));

    }

    public function StoreBlog(Request $request) {

        $image = $request->file('blog_image');
        $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

        Image::make($image)->resize(430,327)->save('upload/blog/' . $name_gen);
        $save_url = 'upload/blog/'. $name_gen;

       

        Blog::insert([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title, 
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description,
            'blog_image' => $save_url,
            'created_at' => Carbon::now()              

        ]); 

        $notification = array(
        'message' => 'Blog  Inserted Successfully', 
        'alert-type' => 'success'
        );

        return redirect()->route('all.blog')->with($notification);

    }

    public function EditBlog($id) {

        $editBlog = Blog::findOrFail($id);
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        return view('admin.blogs.edit_blog', compact('editBlog', 'categories'));

    }

    public function UpdateBlog(Request $request) {

        $blog_id = $request->id;

        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();

            Image::make($image)->resize(430,327)->save('upload/blog/' . $name_gen);
            $save_url = 'upload/blog/'. $name_gen;

            Blog::findOrFail($blog_id)->update([
                'blog_category_id' => $request->blog_category_id,
                'blog_title' => $request->blog_title, 
                'blog_tags' => $request->blog_tags,
                'blog_description' => $request->blog_description,
                'blog_image' => $save_url   
            ]);

            $notification = array(
                'message' => 'Blog Updated Successfuly',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.blog')->with($notification);

        } else {
           Blog::findOrFail($slide_id)->update([
            'blog_category_id' => $request->blog_category_id,
            'blog_title' => $request->blog_title, 
            'blog_tags' => $request->blog_tags,
            'blog_description' => $request->blog_description
                
            ]);

            $notification = array(
                'message' => 'Blog Without Image Updated Successfuly',
                'alert-type' => 'success'
            );
    
            return redirect()->route('all.blog')->with($notification);

        }

    }


    public function DeleteBlog($id) {

        $deleteBlog = Blog::findOrFail($id);
        $img = $deleteBlog->blog_image;
        unlink($img);

        Blog::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Blog Deleted Successfuly',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function BlogDetails($id) {

        $allBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $blogs = Blog::findOrFail($id);
        return view('frontend.blog_details', compact('blogs','allBlogs','categories'));

    }

    public function CategoryBlog($id) {

        $allBlogs = Blog::latest()->limit(5)->get();
        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $blogPost = Blog::where('blog_category_id', $id)->orderBy('id', 'DESC')->get();
        $categoryName = BlogCategory::findOrFail($id);
        return view('frontend.cat_blog_details', compact('blogPost', 'allBlogs', 'categories', 'categoryName'));

    }

    public function HomeBlog() {

        $categories = BlogCategory::orderBy('blog_category', 'ASC')->get();
        $allBlogs = Blog::latest()->paginate(3);
        return view('frontend.blog', compact('allBlogs', 'categories'));
    }


}
