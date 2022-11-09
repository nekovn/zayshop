<?php

namespace App\Services;

use App\Helpers\Util\Helper;
use Illuminate\Http\UploadedFile;


class LocalFileUploadService
{
    private $file, $file_name;

    public function __construct(UploadedFile $uploadedFile)
    {
        $this->file = $uploadedFile;
    }

    public function save($path, $disk, $oldImage = null)
    {
        Helper::deleteOldImage($path, $disk, $oldImage);
        $this->file->storeAs($path, $this->generateFileName(), $disk);
        return $this;
    }

    protected function generateFileName()
    {
        return $this->file_name = $this->file->hashName(null, 10);
    }

    public function getFileName()
    {
        return $this->file_name;
    }

}
