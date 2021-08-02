<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class LangController extends Controller
{
    function changeLanguage(Request $request) {
        $language = $request->language;
        session()->put('local', $language);
        return back();
    }
}
