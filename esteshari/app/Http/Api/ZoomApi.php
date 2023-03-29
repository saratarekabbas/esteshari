<?php

namespace App\Http\Api;

use Illuminate\Support\Facades\Http;
use Firebase\JWT\JWT;

class ZoomApi
{
    private $apiKey;
    private $apiSecret;

    public function __construct($apiKey, $apiSecret)
    {
        $this->apiKey = $apiKey;
        $this->apiSecret = $apiSecret;
    }

    public function createMeeting($data)
    {
        $url = 'https://api.zoom.us/v2/users/me/meetings';

        // Set up the request headers
        $headers = [
            'Authorization' => 'Bearer ' . $this->generateZoomJWT(),
            'Content-Type' => 'application/json'
        ];

        // Set up the request body with the meeting details
        $body = [
            'topic' => $data['topic'],
            'type' => $data['type'] ?? 2,
            'start_time' => $data['start_time'],
            'duration' => $data['duration'],
            'timezone' => $data['timezone'] ?? 'UTC',
            'password' => $data['password'] ?? '',
            'agenda' => $data['agenda'] ?? '',
            'settings' => $data['settings'] ?? [
                    'join_before_host' => true,
                    'mute_upon_entry' => false,
                    'auto_recording' => 'none',
                    'registrants_email_notification' => true,
                ],
        ];

        // Make the HTTP POST request to the Zoom API
        $response = Http::withHeaders($headers)->post($url, $body);

        // Return the start_url or join_url property of the response, depending on your use case
        return $response->json()['start_url'] ?? $response->json()['join_url'];
    }



    private function generateZoomJWT()
    {
        $payload = [
            'iss' => $this->apiKey,
            'exp' => time() + 60
        ];

        $jwt = JWT::encode($payload, $this->apiSecret, 'HS256');

        return $jwt;
    }
}
