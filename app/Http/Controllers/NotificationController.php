<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Mail;
use App\Models\Devi;

class NotificationController extends Controller
{

    //MEs notifications
    public static function mines_notification($for){

        $notifs = Notification::where('for', $for)->where('actor_id',Auth::user()->id)->orderByDesc('id')->get();
        return $notifs;
    }

    //Créer une notification
    public static function create_notification($data){

        Notification::create([
            'actor_id'=> $data['actor_id'],
            'for'=> $data['for'],
            'title' => $data['title'],
            'content' => $data['content'],
            'link'=> $data['link'],
        ]);
        return true;
    }
}
