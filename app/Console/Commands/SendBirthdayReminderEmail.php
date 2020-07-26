<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;
use App\Mail\BirthdayReminder;
use Mail;
use App;
// use App\User;

class SendBirthdayReminderEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:birthday';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Email users a birthday Reminder message';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
        { 
            $i = 0;
            $users = User::whereMonth('date_birth', '=', date('m'))
                          ->whereDay('date_birth', '=', date('d'))
                          ->get();  

          $users1 = User::whereMonth('anniversary', '=', date('m'))
                        ->whereDay('anniversary', '=', date('d'))
                        ->get();

            foreach($users as $user)
            {
                // $email="moaz2088@gmail.com";
                // Mail::to($email)->send(new BirthdayReminder($user));
                // $i++; 

                $data = [
                    'phone' => '07427579709', // Receivers phone
                    'body' => "Today is  $user->name Birthday ", // Message
                ];
                $json = json_encode($data); // Encode data to JSON
                // URL for request POST /message
                $url = 'https://api.chat-api.com/message?token=acend0y6vsht5d81';
                // Make a POST request
                $options = stream_context_create(['http' => [
                        'method'  => 'POST',
                        'header'  => 'Content-type: application/json',
                        'content' => $json
                    ]
                ]);
                $result = file_get_contents($url, false, $options);

                $i++;
                // Send a request
            }

            foreach($users1 as $user)
            {
                $data = [
                    'phone' => '07427579709', // Receivers phone
                    // 'phone' => '+970599984222', // Receivers phone
                    'body' => "Today is  $user->name Anniversary ", // Message
                ];
                $msg = "Today is  $user->name Anniversary ";
                $json = json_encode($data); 
                // $url = 'https://api.chat-api.com/message?token=acend0y6vsht5d81';
                $url = "https://api.chat-api.com/instance154402/sendMessage?token=acend0y6vsht5d81";
                // Make a POST request
                $options = stream_context_create(['http' => [
                        'method'  => 'POST',
                        'header'  => 'Content-type: application/json',
                        'content' => $json
                    ]
                ]);
                $result = file_get_contents($url, false, $options);

                $i++;
            }

            $this->info($i.' Birthday messages sent successfully!');
        }
}