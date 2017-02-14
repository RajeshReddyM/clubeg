<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Input;
use App;
use Lang;
use Log;
class LanguageController extends Controller
{
    // To change the current language via ajax
    public function changeLanguage(Request $request)
    {
    	if ($request->ajax()) {
    		Session::put('locale', $request->locale);
    	}
    }
}