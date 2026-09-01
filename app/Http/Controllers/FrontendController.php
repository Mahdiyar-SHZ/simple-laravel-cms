<?php

namespace App\Http\Controllers;

use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\Comment;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;


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
        $comments = $blog->comment()->with('user')->latest()->get();
        return view('home.blog.blog_detail', compact('blog','blogcat','blog_recent', 'comments'));
    }

    public function BlogCategory($id){
        $blogcat = BlogCategory::latest()->withCount('posts')->get();
        $blog_recent = BlogPost::latest()->limit(3)->get();
        $category_name = BlogCategory::where('id', $id)->first();
        $blog = BlogPost::where('blog_categoty',$id)->get();
        return view('home.blog.blog_category', compact('blog','blogcat','blog_recent','category_name'));

    }

    public function ContactUs(){
        return view('home.contact.contact_us');
    }

    public function SendContactUs(Request $request){
        $validateData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        Contact::create($validateData);

        $notification = array(
            'message' => 'Message Sent!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function Contacts(){
        $contact = Contact::latest()->get();
        return view('admin.backend.contact.all_contact', compact('contact'));
    }

    public function DelteContact($id){
        $contact = Contact::findOrFail($id);
        $contact->delete();
        $notification = array(
            'message' => 'Message Deleted!',
            'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);
    }

    public function ViewContact($id){
        $contact = Contact::findOrFail($id);
        return view('admin.backend.contact.view_contact', compact('contact'));
    }
}
