<?php

namespace App\Http\Controllers\Admin;

use App\Jobs\Notify;
use App\Models\User;
use App\Jobs\SendSms;
use App\Models\Admin;
use App\Jobs\AdminNotify;
use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function index()
    {
        return view('admin.notifications.index');
    }

    public function sendNotifications(Request $request)
    {
        $rows = $this->getrows($request->user_type) ;

        if ($request->type == 'notify') {
            $this->notify($rows , $request->user_type, $request);
        }else if ($request->type == 'email') {
            $this->sendMail($rows ,  $request);
        }else{
            $this->sendSms($rows->pluck('phone')->toArray() ,  $request->message);
        }
        return response()->json() ;
    }

    function notify($rows , $type , $request) {
        if ($type == 'admins') {
            dispatch(new AdminNotify($rows, $request));
        } else {
            dispatch(new Notify($rows, $request));
        }
    }

    function sendMail($rows , $request) {
        dispatch(new SendEmailJob($rows->pluck('email'), $request));
    }
    function sendSms($phones , $message) {
        dispatch(new SendSms($phones , $message));
    }

    public function getrows($type){
        if ($type == 'all_users') {
            $rows = User::get();
        } else if ($type == 'active_users') {
            $rows = User::where('active', true)->get();
        } else if ($type == 'not_active_users') {
            $rows = User::where('active', false)->get();
        } else if ($type == 'blocked_users') {
            $rows = User::where('is_blocked', true)->get();
        } else if ($type == 'not_blocked_users') {
            $rows = User::where('is_blocked', false)->get();
        } else if ($type == 'admins') {
            $rows = Admin::get();
        }
        return $rows ;
    }
}
