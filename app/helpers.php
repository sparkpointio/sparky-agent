<?php

use Illuminate\Support\Facades\Route;

if(!function_exists('ogDetails')) {
    function ogDetails() {
        if(Route::currentRouteName() == 'home.index') {
            $data['title'] = config('app.name');
            $data['description'] = 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.';
            $data['image'] = asset('img/home/og.jpg');
        } else {
            $data['title'] = config('app.name');
            $data['description'] = 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.';
            $data['image'] = asset('img/home/og.jpg');
        }

        return $data;
    }
}

if(!function_exists('userRole')) {
    function userRole() {
        return [
            'Standard',
            'Admin',
        ];
    }
}
