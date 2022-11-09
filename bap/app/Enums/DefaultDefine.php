<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

class DefaultDefine extends Enum implements DefineInterface
{
    const PER_PAGE = 10;

    const STATUS_BTN = 0;

    const SORT_DEFAULT = 'desc';

    const IMAGE_PATH = 'images/banner';
    const IMAGE_ROOM_PATH = 'images/room';
    const IMAGE_CUSTOMER_PATH = 'images/client';

    const IMAGE_DISK_PATH = 'storage_image';

    const ACCEPT_IMG = 'image/jpeg, image/png, image/jpg';

    const EXPIRE = 10; //期限切れ

    public static function getKeyValue(): array
    {
        $keyValue = self::getKeyValue();
    }

    public static function getMethods(): array
    {
        return [];
    }
}
