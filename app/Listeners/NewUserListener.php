<?php

namespace App\Listeners;

use App\Events\NewUserEvent;
use App\Notifications\NewUser;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Http;

class NewUserListener
{

    public function handle(NewUserEvent $event)
    {
        Notification::send($event->user, new NewUser($event->user, $event->password));
        $url = 'https://em.clientbud.com/public/api/v2/users/registerWithoutEmailVerification';
        $full_name = explode(' ', $event->user->name);
        $data = [
            'email' => $event->user->email,
            'first_name' => $full_name[0],
            'last_name' => count($full_name) > 1 ? $full_name[1] : ' ',
            'password' => 'mhCSaw%MSLqc',
            'timezone' => 'UTC',
            'language_id'   => 7
        ];

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

        $response = curl_exec($ch);
        $statusCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        // Handle the response
        if ($statusCode === 200) {
            $data = json_decode($response, true);
            // Do something with $data
        } else {
            // Handle the error
            $error = $response;
            // Do something with $error
        }
    }

}
