<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function send()
    {
        Mail::send(['text' => 'mail'], ['name', 'Sarthak'], function ($message) {
            $message->to('poudelnipriyanka@gmail.com','To Bitfumes')->subject('Test email');
            $message->from('poudelnipriyanka@gmail.com',' Bitfumes');



        });
    }
}