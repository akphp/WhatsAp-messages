<?php
namespace App\Mail;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
class BirthdayReminder extends Mailable
{
    use Queueable, SerializesModels;
    public $user;

    public function __construct()
    {
         $this->User = $user;
    }

    public function build()
    {
     $user = $this->user;
     return $this->from('moaz2088@gmail.com')
                 ->view('emails.birthday',compact('user'));
    }
    

    
}