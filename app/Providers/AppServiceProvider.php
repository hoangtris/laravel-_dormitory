<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\User;
use App\Notification;
use Auth;
use App\Feedback;

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
        # người dùng gửi lên admin- 1
        # admin xem               - 2
        # admin phản hồi lại      - 3
        # người dùng xem          - 4
        view()->composer('layouts.admin',function($view){
            $notifyTotal   = Notification::where('status', 1)->get();
            $notifyBooking = Notification::where('type', 'Đặt phòng')->where('status', 1)->get();
            $notifyCancel  = Notification::where('type', 'Trả phòng')->where('status', 1)->get();
            $notifyRequest = Notification::where('type', 'Yêu cầu')->where('status', 1)->get();
            $notifyFeedback = Feedback::where('status', 0)->get();
            $view->with('notifyTotal',$notifyTotal);
            $view->with('notifyBooking',$notifyBooking);
            $view->with('notifyCancel',$notifyCancel);
            $view->with('notifyRequest',$notifyRequest);
            $view->with('notifyFeedback',$notifyFeedback);
        });

        view()->composer('layouts.admin',function($view){
            $id = Auth::id();
            $user = User::find($id);
            $view->with('user',$user);
        });

        //-----------client

        view()->composer('layouts.client',function($view){
            $notifyTotal = Notification::where('status', 3)->where('user_id', Auth::id())->get();
            $view->with('notifyTotal',$notifyTotal);
        });

        view()->composer('layouts.client',function($view){
            $id = Auth::id();
            $user = User::find($id);
            $view->with('user',$user);
        });
    }
}
