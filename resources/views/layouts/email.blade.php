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
        <td class="text-center p-2 p-md-5">
            <div class="d-inline-block w-100" style="max-width:600px; background-color:#ffffff; border:1px solid #d7dce0">
                <div class="bg-color-1 text-start px-md-4 py-3 py-sm-4">
                    <div class="px-3 py-sm-2">
                        <img src="{{ config('app.prod_url') . '/img/home/logo.png' }}" id="logo" alt="{{ config('app.name') }}" />
                    </div>
                </div>

                <div class="text-start px-md-4 py-4 py-md-5">
                    <div class="px-3 py-2 py-md-0">
                        @yield('body')

                        <div class="py-2">
                            <hr class="my-4 "/>
                        </div>

                        <table>
                            <tr>
                                <td style="vertical-align:middle">
                                    <img src="{{ config('app.prod_url') . '/img/home/logo.png' }}" width="20" alt="{{ config('app.name') }}" />
                                </td>
                                <td style="vertical-align:middle; padding-left:20px">
                                    <p class="mb-0"> &copy; {{ date('Y') }} {{ config('app.name') }}. All rights reserved.</p>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </td>
    </tr>
</table>
</body>
</html>
