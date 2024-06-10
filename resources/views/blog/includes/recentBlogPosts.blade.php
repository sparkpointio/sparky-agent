<div class="container py-5">
    <div class="pt-5">
        <p class="text-color-1 text-center tw-tracking-[-0.05em] tw-leading-[1.1em] lg:tw-leading-[1em] xxl:tw-leading-[0.9em] font-size-200 font-size-lg-210 font-size-xl-270 px-4 px-md-0 mb-5 pb-5">Recent Blog Posts</p>

        <div class="row">
            @foreach($blogs as $blog)
                @if(($currentBlog && $currentBlog['id'] != $blog['id']) || (!$currentBlog && $blog['id'] != 1))
            <div class="col-md-6 pe-lg-4 pe-xl-5 mb-5">
                <a href="{{ route('blog.content', str_replace('%2F', ' ', rawurlencode($blog['title']))) }}" class="text-decoration-none">
                    <div class="mb-4">
                        <img src="{{ $blog['banner'] }}" class="w-100" />
                    </div>

                    <p class="text-color-1 text-center tw-tracking-[-0.05em] font-size-200 font-size-lg-210 font-size-xl-270 px-4 px-md-0 mb-4">{{ $blog['title'] }}</p>
                    <p class="text-color-1 text-center font-size-120 font-size-xl-130 mb-0">Ariel Peres, Esq. | {!! ($blog['status'] == 'Published') ? Carbon\Carbon::parse($blog['created_at'])->setTimezone('America/Los_Angeles')->format('d-M-Y') : '<span class="articulat-medium">Coming Soon</span>' !!}</p>
                </a>
            </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
