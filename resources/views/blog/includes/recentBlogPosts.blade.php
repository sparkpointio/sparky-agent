@if(count($blogs) > 1)
<div class="container pt-5">
    <div class="pt-5">
        <p class="bebas-neue text-black text-center h-custom-2 px-4 px-md-0 mb-5 pb-5">Recent Blog Posts</p>

        <div class="row">
            @foreach($blogs as $blog)
                @if(($currentBlog && $currentBlog['id'] != $blog['id']) || !$currentBlog)
            <div class="col-md-6 pe-lg-4 pe-xl-5 mb-5">
                <a href="{{ route('blog.content', $blog['url_slug']) }}" class="text-decoration-none">
                    <div class="mb-4">
                        <img src="{{ $blog['banner'] }}" class="w-100" />
                    </div>

                    <div class="font-size-xl-80">
                        <p class="text-black bebas-neue text-center h-custom-2 px-4 px-md-0 mb-2">{{ $blog['title'] }}</p>
                    </div>

                    <p class="text-secondary text-center h-custom-4 mb-0">{{ $blog['author'] }} | {!! ($blog['status'] == 'Published') ? Carbon\Carbon::parse($blog['created_at'])->format('d-M-Y') : 'Coming Soon' !!}</p>
                </a>
            </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
@endif
