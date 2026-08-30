<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Encoders\WebpEncoder;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function BlogCategory()
    {
        $category = BlogCategory::latest()->get();
        return view("admin.backend.blogcategory.blog_category", compact("category"));
    }

    public function StoreBlogCategory(Request $request)
    {
        BlogCategory::create([
            'category_name' => $request->category_name,
            'category_slug' => \Illuminate\Support\Str::slug($request->category_name),
        ]);
        $notification = array(
            'message' => 'Blog Category crated',
            'alert-type' => 'success',
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function DeleteBlogCategory($id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->delete();
        $notification = array(
            'message' => 'Blog Category Deleted',
            'alert-type' => 'success',
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function EditBlogCategory($id)
    {
        $category = BlogCategory::findOrFail($id);
        return response()->json($category);
    }

    public function UpdateBlogCategory(Request $request, $id)
    {
        $category = BlogCategory::findOrFail($id);
        $category->update([
            'category_name' => $request->category_name,
            'category_slug' => \Illuminate\Support\Str::slug($request->category_name),
        ]);
        $notification = array(
            'message' => 'Blog Category Updated',
            'alert-type' => 'success',
        );

        return redirect()->route('all.blog.category')->with($notification);
    }

    public function AllBlogPost()
    {
        $post = BlogPost::latest()->get();
        return view('admin.backend.post.all_post', compact('post'));
    }

    public function AddBlogPost()
    {
        $category = BlogCategory::latest()->get();
        return view('admin.backend.post.add_post', compact('category'));
    }

    public function DeleteBlogPost($id)
    {
        $post = BlogPost::findOrFail($id);
        if ($post->blog_image && file_exists(public_path($post->blog_image))) {
            unlink(public_path($post->blog_image));
        }
        $post->delete();

        $notification = array(
            'message' => 'Post Deleted successfully',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function StoreBlogPost(Request $request)
    {
        if ($request->file('blog_image')) {
            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . 'webp';
            $manager = ImageManager::usingDriver(Driver::class);
            $img = $manager->decode($image->getPathname());
            $img->resize(746, 500)->encode(new WebpEncoder(80))->save(public_path('upload/post/' . $name_gen));
            $save_url = 'upload/post/' . $name_gen;

            BlogPost::create([
                'blog_title' => $request->blog_title,
                'blog_categoty' => $request->blog_categoty,
                'blog_content' => $request->blog_content,
                'blog_slug' => \Illuminate\Support\Str::slug($request->blog_title),
                'blog_image' => $save_url
            ]);

            $notification = array(
                'message' => 'Post Inserted successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog.post')->with($notification);
        }

        BlogPost::create([
            'blog_title' => $request->blog_title,
            'blog_categoty' => $request->blog_categoty,
            'blog_content' => $request->blog_content,
            'blog_slug' => \Illuminate\Support\Str::slug($request->blog_title)
        ]);

        $notification = array(
            'message' => 'Post Inserted successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.post')->with($notification);
    }


    public function EditBlogPost($id)
    {
        $blog = BlogPost::findOrFail($id);
        $blogcat = BlogCategory::all();
        return view("admin.backend.post.edit_post", compact("blog", "blogcat"));
    }

    public function UpdateBlogPost(Request $request, $id)
    {
        $blog = BlogPost::findOrFail($id);


        if ($request->file('blog_image')) {
            if ($blog->blog_image && file_exists(public_path($blog->blog_image))) {
                unlink(public_path($blog->blog_image));
            }

            $image = $request->file('blog_image');
            $name_gen = hexdec(uniqid()) . '.' . 'webp';
            $manager = ImageManager::usingDriver(Driver::class);
            $img = $manager->decode($image->getPathname());
            $img->resize(746, 500)->encode(new WebpEncoder(80))->save(public_path('upload/post/' . $name_gen));
            $save_url = 'upload/post/' . $name_gen;

            $blog->update([
                'blog_title' => $request->blog_title,
                'blog_categoty' => $request->blog_categoty,
                'blog_content' => $request->blog_content,
                'blog_slug' => \Illuminate\Support\Str::slug($request->blog_title),
                'blog_image' => $save_url
            ]);

            $notification = array(
                'message' => 'Post Updated successfully',
                'alert-type' => 'success'
            );

            return redirect()->route('all.blog.post')->with($notification);
        }

        $blog->update([
            'blog_title' => $request->blog_title,
            'blog_categoty' => $request->blog_categoty,
            'blog_content' => $request->blog_content,
            'blog_slug' => \Illuminate\Support\Str::slug($request->blog_title)
        ]);

        $notification = array(
            'message' => 'Post Updated successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('all.blog.post')->with($notification);
    }
}
