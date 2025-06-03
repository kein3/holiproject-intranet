<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ChatGptService;

class ChatGptController extends Controller
{
    protected ChatGptService $chatGpt;

    public function __construct(ChatGptService $chatGpt)
    {
        $this->chatGpt = $chatGpt;
    }

    // Affiche la vue de chat
    public function index()
    {
        return view('chat.index');
    }

    // Reçoit un prompt depuis AJAX, retourne la réponse JSON
    public function ask(Request $request)
    {
        $request->validate([
            'prompt' => 'required|string',
        ]);

        $answer = $this->chatGpt->ask($request->input('prompt'));

        return response()->json([
            'answer' => $answer,
        ]);
    }
}

