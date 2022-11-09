<?php

namespace App\Notifications\Admin;

use App\Enums\DefaultDefine;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TwoFactorCode extends Notification
{
    use Queueable;

    /**
     * Get the notification's delivery channels.
     *
     * @param mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //Thông báo có thể được gửi qua các kênh mail, database, broadcast, nexmo, và slack.
        // Phương thức via nhận một $notifiable instance, là thể hiện của class đang được gửi đi

        return ['mail'];
    }

    public function toMail($notifiable)
    {
        $url = route('admin.verify.index');
        $appName = config('app.name');
        $expire = DefaultDefine::EXPIRE;
        return (new MailMessage)
            ->subject("$appName xác minh hai bước")
            ->markdown('admin.auth.twoFactorEmail', [
                'url' => $url,
                'code' => $notifiable->two_factor_code,
                'expire' => $expire,
                'user' => $notifiable->name
            ]);


    }
}
