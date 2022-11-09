<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
/**
 * お客様向けメール作成クラス
 *
 * @category  システム共通
 * @package   App\Mail
 * @version   1.0
 */
class ContactMail extends Mailable
{
    use Queueable, SerializesModels;
    private $content;
    private $title;
    private $email;
    private $code;
    private $name;

    /**
     * コンストラクタ
     *
     * @access public
     */
    public function __construct($inputs)
    {
        $this->title  = $inputs['subject'];
        $this->content  = $inputs['textarea'];
        $this->email  = $inputs['email'];
        $this->code  = $inputs['code'];
        $this->name = $inputs['client'];
    }

    /**
     * お客様向けメール作成
     */
    public function build()
    {
        $view = 'mail.contact.client';
        $to = $this->email;
        $from = config('app.mail_from');
        $from_name = config('app.mail_from_name');
        $subject = __('global.C.subject.text', ['code' => $this->code]);

        return $this->text($view)
                    ->to($to)
                    ->from($from, $from_name)
                    ->subject($subject)
                    ->with([
                            'name'  => $this->name,
                            'title' => $this->title,
                            'code'  => $this->code,
                            'content'  => $this->content,
                    ]);
    }
}
