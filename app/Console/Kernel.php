<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class Kernel extends ConsoleKernel
{
	public $booking_no="";
	public $booking_id="";
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
	 
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
		 
		
		$schedule->call(function () {
			//try{ 
			$to_name = 'Vennimuthu';
			$to_email = 'vennimuthujtech@gmail.com';
 		$result = DB::select("select TIME_TO_SEC(TIMEDIFF('".date("Y-m-d H:i:s")."', created_at)) diff,id,booking_no from `booking` where `status` = 0 and mail_send=0");	
			foreach($result as $va=>$key){
				
 				if($key->diff>30){
					$booking_no=$key->booking_no;
					$booking_id=$key->id;
				}else
					exit;
			}	
		//error_reporting(0);
		Mail::send([], [], function($message) use ($to_name, $to_email) {
		$message->to($to_email, $to_name)
		->subject('Ticket Not Booked') ->setBody("<h1>Hi, Admin!</h1><br> $booking_no Ticket Not Booked", "text/html");
		$message->from('vennimuthu1992@gmail.com','Test Mail');
        });
		 $result1 = DB::update("UPDATE `booking` SET `mail_send` = '1' WHERE `booking`.`id` = ".$booking_id."");
			//}catch(\Exception $e){
			//print_r($e->getMessage());}
    })->everyMinute();
	}

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
