<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Session;

class ContactController extends Controller
{
    function sendContactMsg()
    {
        // var_dump(request()->all());
        $attributes = request()->validate([
            'first_name' => 'required|min:1|max:100',
            'last_name' => 'required|min:1|max:100|',
            'email' => 'required|email',
            'message' => 'required',
            'contact_number' => 'required|min:10',
            'g-recaptcha-response' => function ($attribute, $value, $fail) {
                $secretKey = config('services.recaptcha.secret');
                $response = $value;
                $userIp = $_SERVER['REMOTE_ADDR'];
                $url = 'https://www.google.com/recaptcha/api/siteverify?secret='.$secretKey.'&response='.$response.'&remoteip='.$userIp;
                $response = file_get_contents($url);
                $response = json_decode($response);

                if (!$response->success) {
                    session()->flash('g-recaptcha-response', 'Please check reCAPTCHA.');
                    session()->flash('alert-class', 'alert-danger');
                    $fail($attribute.'reCAPTCHA failed');
                }
            },
        ]);

        Contact::create($attributes);

        session()->flash('success', 'Message has been sent !');

        return redirect("/contact-us");
    }
}
