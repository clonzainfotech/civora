<?php

use Illuminate\Database\Seeder;
use App\Models\Notification;
use Carbon\Carbon;

class NotificationData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=30;$i++){
            $notificatoin = new Notification;
            $notificatoin->user_type = 1;
            $notificatoin->user_id = 1;
            $notificatoin->module = $i;
            $notificatoin->message = 'Test notification for'.$i;
            $notificatoin->created_at = Carbon::now()->addDay($i)->format('Y-m-d H:i:s');
            $notificatoin->save();
        }
    }
}
