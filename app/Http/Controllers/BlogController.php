<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
    public function index() {
        $currentBlog = null;

        $blogs = Blog::where('status', 'Coming Soon')
            ->orWhere('status', 'Published')
            ->get();

        $featuredBlog = Blog::where('is_featured', 1)
            ->first();

        return view('blog.index', compact('currentBlog', 'blogs', 'featuredBlog'));
    }

    public function content($content) {
        $currentBlog = Blog::where('url_slug', $content)
            ->first();

        if(!$currentBlog) {
            return redirect()->route('blog.index');
        }

        if($currentBlog['status'] != 'Published') {
            if(Auth::user()->role != 1) {
                return redirect()->route('blog.index');
            }
        }

        $blogs = Blog::where('status', 'Coming Soon')
            ->orWhere('status', 'Published')
            ->get();

        return view('blog.content', compact('currentBlog', 'blogs'));
    }
}
