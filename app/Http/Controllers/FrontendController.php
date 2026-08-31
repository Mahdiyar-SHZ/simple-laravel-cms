<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function OurTeam()
    {
        return view('home.team.team_page');
    }

    public function AboutUs()
    {
        return view('home.about.about_us');
    }

    public function BlogPage()
    {
        $blogcat = BlogCategory::latest()->withCount('posts')->get();
        $blog = BlogPost::latest()->get();
        $blog_recent = BlogPost::latest()->limit(3)->get();

        return view('home.blog.blog_page', compact('blog', 'blogcat','blog_recent'));
    }

    public function DetailBlogPost($blog_slug)
    {
        $blogcat = BlogCategory::latest()->withCount('posts')->get();
        $blog_recent = BlogPost::latest()->limit(3)->get();
        $blog = BlogPost::where('blog_slug',$blog_slug)->firstOrFail();
        return view('home.blog.blog_detail', compact('blog','blogcat','blog_recent'));
    }

    public function BlogCategory($id){
        $blogcat = BlogCategory::latest()->withCount('posts')->get();
        $blog_recent = BlogPost::latest()->limit(3)->get();
        $category_name = BlogCategory::where('id', $id)->first();
        $blog = BlogPost::where('blog_categoty',$id)->get();
        return view('home.blog.blog_category', compact('blog','blogcat','blog_recent','category_name'));

    }
}
