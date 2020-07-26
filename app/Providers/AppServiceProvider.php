<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // User::created(function($admin) {
        //         retry(5, function() use ($admin) {
        //             Mail::to($admin)->send(new AdminCreated($admin));
        //         }, 100);
        //     });


        // public function handle()
        // { 
        //    $i = 0;
        //    $users = User::whereMonth('dob', '=', date('m'))->whereDay('dob', '=', date('d'))->get();  
        
        //    foreach($users as $user)
        //    {
        //        $email="xxxxxxxx@gmail.com";
        //        Mail::to($email)->send(new BirthdayReminder($user));
        //        $i++; 
        //    }
        
        //    $this->info($i.' Birthday messages sent successfully!');
        // }

        

    }
}
