<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = Message::with("user")->where("user_id", "=", Auth::id())->get()->toArray();

        if (!$conversations) {
            return abort(401);
        }

        return view('pages.dashboard.conversations', compact("conversations"));
    }

    public function show($message_id)
    {
        $message = Message::with("user")->where("user_id", "=", Auth::id())->where("id", "=", $message_id)->get()->first();

        if (!$message) {
            return abort(401);
        }
        // get message from database (paramentro dinamico) e passarlo alla view con compact
        return view('pages.dashboard.message', compact("message"));
    }
}
