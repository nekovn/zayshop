<?php

namespace App\Notifications\Member;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordResetNotification extends Notification
{
    //https://viblo.asia/p/laravel-tim-hieu-ve-notifications-phan-1-Az45bbMV5xY
    //Gửi thông báo có thể mất thời gian, đặc biệt nếu kênh cần một API ngoài để gọi phục vụ thông báo.
    // Để tăng tốc ứng dụng của bạn, hãy đặt nó vào queue bằng cách thêm ShouldQueue interface và Queueable trait đến class của bạn.

    use Queueable;

    private $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
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
        $url = route('client.password.reset', ['token' => $this->token, 'email' => $notifiable->email]);
        $appName = config('app.name');
        return (new MailMessage)
            ->subject("$appName quên mật khẩu thành viên")
            ->markdown('client.auth.passwords.passwordresetmail', ['url' => $url, 'user' => $notifiable]);


    }
}
