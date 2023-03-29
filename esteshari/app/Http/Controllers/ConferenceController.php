<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConferenceController extends Controller
{
    public function index(Request $request, $room)
    {
        $agoraAppId = env('AGORA_APP_ID');
        return view('conference', ['room' => $room, 'agoraAppId' => $agoraAppId]);
    }
}
