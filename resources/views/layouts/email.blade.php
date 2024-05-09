<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('style')
</head>

<body style="background-color:#f7f7f7">
<table class="border-0 w-100">
    <tr>
        <td class="text-center p-3 p-md-5">
            <div class="d-inline-block w-100" style="max-width:600px; background-color:#ffffff; border:1px solid #d7dce0">
                <div class="bg-color-1 text-start ps-5 py-4">
                    <div class="py-2">
                        <img src="{{ config('app.prod_url') . '/img/home/logo.png' }}" width="60" alt="{{ config('app.name') }}" />
                    </div>
                </div>

                <div class="text-start px-md-4 py-4 py-md-5">
                    <div class="px-3 py-2 py-md-0">
                        @yield('body')

                        <div class="py-2">
                            <hr class="my-4 "/>
                        </div>

                        <p class="mb-0"><img src="{{ config('app.prod_url') . '/img/home/logo.png' }}" width="20" alt="{{ config('app.name') }}" style="margin-top:-4px" />&nbsp;&nbsp; &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>
</body>
</html>
