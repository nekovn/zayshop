<?php

namespace App\Enums;

use BenSampo\Enum\Enum;


final class ContactDefine extends Enum implements DefineInterface
{
    const TEL_ICON = 'fa-phone';
    const MAIL_ICON = 'fa-envelope';
    const ADDRESS_ICON = 'fa-map-marker-alt';
    const FACEBOOK_ICON = 'fa-facebook-f';
    const INST_ICON = 'fa-instagram';
    const TWITTER_ICON = 'fa-twitter';
    const ADDRESS_LINK = 'https://www.google.com/maps?q=';
    const FACEBOOK_LINK = 'https://fb.com/';
    const INST_LINK = 'https://www.instagram.com';
    const TWITTER_LINK = 'https://twitter.com/';

    public static function getKeyValue(): array
    {
        $keyValue = self::getConstants();

        $keyValue['TEL'] = config('app.admin_tel');
        $keyValue['TEL_TO'] = 'tel:' . $keyValue['TEL'];

        $keyValue['MAIL'] = config('app.admin_mail');
        $keyValue['MAIL_TO'] = 'mailto:' . $keyValue['MAIL'];

        $keyValue['ADDRESS'] = config('app.admin_address');
        $keyValue['ADDRESS_TO'] = self::ADDRESS_LINK . $keyValue['ADDRESS'];

        $facebook = config('app.admin_facebook');
        $keyValue['FACEBOOK_LINK'] = $facebook ? self::FACEBOOK_LINK . $facebook : '';

        $inst = config('app.admin_inst');
        $keyValue['INST_LINK'] = $inst ? self::INST_LINK . $inst : '';

        $twitter = config('app.admin_twitter');
        $keyValue['TWITTER_LINK'] = $twitter ? self::TWITTER_LINK . $twitter : '';


        return $keyValue;
    }

    public static function getMethods(): array
    {
        $keyValue['contact'] = [
            'address' => [
                'href'    => self::getKeyValue()['ADDRESS_TO'],
                'class'   => '',
                'content' => self::getKeyValue()['ADDRESS'],
            ],
            'tell' => [
                'href'    => self::getKeyValue()['TEL_TO'],
                'class'   => '',
                'content' => self::getKeyValue()['TEL'],
            ],
            'mail' => [
                'href'    => self::getKeyValue()['MAIL_TO'],
                'class'   => '',
                'content' => self::getKeyValue()['MAIL'],
            ],
        ];
        $keyValue['socials'] = [
            'facebook'   => [
                'href'   => self::getKeyValue()['FACEBOOK_LINK'],
                'class'  => 'bg-blue-lt',
            ],
            'instagram'       => [
                'href'   => self::getKeyValue()['INST_LINK'],
                'class'  => "bg-red-lt",
            ],
            'twitter'    => [
                'href'   => self::getKeyValue()['TWITTER_LINK'],
                'class'  => "bg-azure-lt",
            ]
        ];

        return $keyValue;
    }


}
