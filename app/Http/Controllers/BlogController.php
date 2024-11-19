<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use DOMDocument;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
        $currentBlog = null;

        $blogs = Blog::where('status', 'Coming Soon')
            ->orWhere('status', 'Published')
            ->get();

        $featuredBlog = Blog::find(1);
        $featuredBlog['body'] = $this->truncateWithEllipsis($this->getFirstPTagContent(file_get_contents($featuredBlog->body)));

        return view('blog.index', compact('currentBlog', 'blogs', 'featuredBlog'));
    }

    public function content($content) {
        $currentBlog = Blog::whereRaw("REPLACE(title, '/', ' ') LIKE ?", ['%' . $content . '%'])
            ->where('status', 'Published')
            ->first();

        if(!$currentBlog) {
            return redirect()->route('blog.index');
        }

        $blogs = Blog::where('status', 'Coming Soon')
            ->orWhere('status', 'Published')
            ->get();

        return view('blog.content', compact('currentBlog', 'blogs'));
    }

    public function getFirstPTagContent($html) {
        $doc = new DOMDocument();

        // Suppress warnings from malformed HTML
        @$doc->loadHTML($html);

        // Get all <p> tags
        $pTags = $doc->getElementsByTagName('p');

        // Return the content of the first <p> tag if it exists
        if ($pTags->length > 0) {
            return $pTags->item(0)->textContent;
        }

        return null; // Return null if no <p> tags are found
    }

    function truncateWithEllipsis($text, $maxLength = 150) {
        if (strlen($text) <= $maxLength) {
            return $text;
        }

        // Truncate without cutting off words
        $truncated = substr($text, 0, $maxLength);
        $lastSpace = strrpos($truncated, ' ');

        if ($lastSpace !== false) {
            $truncated = substr($truncated, 0, $lastSpace);
        }

        return $truncated . '...';
    }
}
