<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        


        // $users1 = User::whereMonth('anniversary', '=', date('m'))
        // ->whereDay('anniversary', '=', date('d'))
        // ->get();
        
        // foreach($users1 as $user)
        // {
        //     $data = [
        //         'phone' => '07427579709', // Receivers phone
        //         'body' => "Today is  $user->name Anniversary ", // Message
        //     ];
        //     $msg = "Today is  $user->name Anniversary ";
        //     $json = json_encode($data); 
        //     // $url = 'https://api.chat-api.com/message?token=acend0y6vsht5d81';
        //     $url = "https://api.chat-api.com/instance154402/sendMessage?token=acend0y6vsht5d81";
        //     // Make a POST request
        //     $options = stream_context_create(['http' => [
        //             'method'  => 'POST',
        //             'header'  => 'Content-type: application/json',
        //             'content' => $json
        //         ]
        //     ]);
        //     $result = file_get_contents($url, false, $options);

        // }
        // dd($result);
        return view('welcome', compact('users'));
    }
}
