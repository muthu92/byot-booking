<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Pusher\Pusher;

class PusherNotificationController extends Controller{

    public function notification(){
        //Remember to change this with your cluster name.
        $options = array(
            'cluster' => 'ap2',
            'encrypted' => true
        );

        //Remember to set your credentials below.
        $pusher = new Pusher(
            'a0431439590a90562551',
            '91bc8af3cb197ff17e96',
            '1163782', $options
        );

        $data['message'] = 'Hello XpertPhp';

        //Send a message to notify channel with an event name of notify-event
       // $pusher->trigger('jobs', 'jobs-event', $message);
		$pusher->trigger('notification', 'App\\Events\\TestEvent', $data);
    }
}