<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="title" content="@yield('title') | {{ config('app.name') }}" />
    <meta name="description" content="{{ ogDetails()['description'] }}">
    <meta name="author" content="Bellyn Studio">

    <meta property="og:url" content="{{ URL::current() }}" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="@yield('title') | {{ config('app.name') }}" />
    <meta property="og:description" content="{{ ogDetails()['description'] }}" />
    <meta property="og:image" content="{{ ogDetails()['image'] }}" />

    <link rel="icon" href="{{ asset('img/home/logo.png') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://site-assets.fontawesome.com/releases/v6.3.0/css/all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    @if(Str::startsWith(Route::currentRouteName(), 'admin.'))
    <link href="{{ asset('lib/sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
    @endif

    {{--  DataTables  --}}
    <link href="https://cdn.datatables.net/v/bs5/dt-2.0.7/datatables.min.css" rel="stylesheet">

    {{--  QuillJS  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/2.0.2/quill.snow.min.css" integrity="sha512-UmV2ARg2MsY8TysMjhJvXSQHYgiYSVPS5ULXZCsTP3RgiMmBJhf8qP93vEyJgYuGt3u9V6wem73b11/Y8GVcOg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{--  Select2  --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />

    {{--  Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')

    <title>@yield('title') | {{ config('app.name') }}</title>
</head>
<body class="app tw-overflow-x-hidden">
    @if(Str::startsWith(Route::currentRouteName(), 'admin.'))
        @include('layouts.includes.admin')
    @else
        @yield('content')
    @endif

    @include('layouts.includes.modals')

    <input type="hidden" name="route_name" value="{{ Route::currentRouteName() }}" />
    <input type="hidden" name="app_url" value="{{ config('app.url') }}" />

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if(Str::startsWith(Route::currentRouteName(), 'admin.'))
    <script src="{{ asset('lib/sb-admin/js/sb-admin-2.min.js') }}"></script>
    @endif

    {{--  DataTables  --}}
    <script src="https://cdn.datatables.net/v/bs5/dt-2.0.7/datatables.min.js"></script>

    {{--  QuillJS  --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/quill/2.0.2/quill.min.js" integrity="sha512-1nmY9t9/Iq3JU1fGf0OpNCn6uXMmwC1XYX9a6547vnfcjCY1KvU9TE5e8jHQvXBoEH7hcKLIbbOjneZ8HCeNLA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/quill-image-resize-module-v2@3.0.0/image-resize.min.js"></script>

    {{--  Select2  --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    @vite('resources/js/app.js')
</body>
</html>
