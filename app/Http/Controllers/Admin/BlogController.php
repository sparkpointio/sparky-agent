<?php

namespace App\Http\Controllers\Admin;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\DataTables;

class BlogController extends Controller
{
    public function index(Request $request) {
        if ($request->ajax()) {
            $data = Blog::orderBy('id', 'desc');

            return DataTables::of($data)
                ->addColumn('date_time', function ($row) {
                    return Carbon::parse($row->created_at)->format('Y-M-d');
                })
                ->addColumn('actions', function ($row) {
                    $content = '
                        <div class="d-flex justify-content-center flex-wrap" style="margin-bottom:-5px">
                            <div class="text-center"><a href="' . route('blog.content', $row->url_slug) . '" target="_blank" rel="noreferrer" class="btn btn-custom-1 btn-sm font-size-80 mx-1" style="min-width:93px; margin-bottom:5px">View</a></div>
                            <div class="text-center"><a href="' . route('admin.blogs.edit', $row->id) . '" class="btn btn-custom-1 btn-sm font-size-80 mx-1" style="min-width:93px; margin-bottom:5px">Edit</a></div>
                        </div>';

                    return $content;
                })
                ->rawColumns(['actions'])
                ->make(true);
        }

        return view('admin.blogs.index');
    }

    public function create() {
        return view('admin.blogs.create');
    }

    public function store(Request $request) {
        $request->validate([
            'id' => 'nullable',
            'title' => 'required',
            'author' => 'required',
            'categories' => 'required|array',
            'categories.*' => 'string',
            'description' => 'required',
            'body' => 'required',
            'url_slug' => 'required',
            'banner' => 'mimes:jpg,jpeg,png,bmp,tiff,pdf,webp|max:10240',
            'status' => 'required|in:Draft,Coming Soon,Published',
        ]);

        if($request->id) {
            $blog = Blog::where('title', $request->title)
                ->where('id', '!=', $request->id)
                ->first();
        } else {
            $blog = Blog::where('title', $request->title)
                ->first();
        }

        abort_if($blog, '422', 'Blog title already exists.');

        if($request->id) {
            $blog = Blog::where('title', $request->title)
                ->first();
        } else {
            $blog = new Blog();
            $blog->body = '';
        }

        if(!$blog['published_at']) {
            if($blog['status'] != 'Published' && $request->status == 'Published') {
                $blog->published_at = Carbon::now();
            }
        }

        $blog->title = $request->title;
        $blog->author = $request->author;
        $blog->categories = json_encode($request->categories);
        $blog->description = $request->description;
        $blog->url_slug = $request->url_slug;
        $blog->status = $request->status;
        $blog->is_featured = $request->is_featured;
        $blog->save();

        if($blog->is_featured == 1) {
            Blog::where('id', '!=', $blog->id)
                ->update(['is_featured' => 0]);
        }

        $body = $request->input('body');
        $fileName = 'blogs/' . $blog['id'] . '/' . uniqid() . '.html';
        Storage::put($fileName, $body, config('filesystems.default'));

        if($blog->body) {
            $previousBody = 'blogs/' . explode('/blogs/', $blog->body)[1];
            if(Storage::exists($previousBody)) {
                Storage::delete($previousBody);
            }
        }

        $blog->body = Storage::url($fileName);
        $blog->update();

        if($request->file('banner')) {
            $file = $request->file('banner');
            $name = $file->hashName();
            $path = '/blogs/' . $blog['id'] . '/';
            Storage::put($path, $file, config('filesystems.default'));
            $banner = config('filesystems.disks.public.url') . $path . $name;

            $blog->banner = $banner;
            $blog->update();
        }

        return response()->json([
            'redirect' => route('admin.blogs.index')
        ]);
    }

    public function edit($id) {
        $blog = Blog::find($id);

        abort_if(!$blog, 404);

        $blog->body = file_get_contents($blog->body);

        return view('admin.blogs.edit', compact('blog'));
    }
}
