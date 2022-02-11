<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index() {
        return view('pages.dashboard.conversations');
    }

    public function show($id) {
        // get message from database (paramentro dinamico) e passarlo alla view con compact
        return view('pages.dashboard.message');
    }
}
