<?php

use Illuminate\Support\Facades\Route;
use Rinvex\Country\Loader;

if(!function_exists('ogDetails')) {
    function ogDetails() {
        if(Route::currentRouteName() == 'home.index') {
            $data['title'] = config('app.name');
            $data['description'] = 'Launch your AI agents without token.';
            $data['image'] = asset('img/home/og.jpg');
        } else {
            $data['title'] = config('app.name');
            $data['description'] = 'Lorem ipsum is placeholder text commonly used in the graphic, print, and publishing industries for previewing layouts and visual mockups.';
            $data['image'] = asset('img/home/og.jpg');
        }

        return $data;
    }
}

if(!function_exists('userRoles')) {
    function userRoles() {
        return [
            'Standard',
            'Admin',
        ];
    }
}

if(!function_exists('getCountryList')) {
    function getCountryList() {
        $countries = Loader::countries();

        uasort($countries, function ($a, $b) {
            return strcmp($a['name'], $b['name']);
        });

        return $countries;
    }
}
