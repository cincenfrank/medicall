<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request)
    {

        $query = $request->input('query');

        return view('pages.guest.search', compact('query'));
    }
}
