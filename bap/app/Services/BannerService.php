<?php

namespace App\Services;

use App\Enums\DefaultDefine;
use App\Repositories\BannerRepository;

class BannerService
{
    use BaseServiceTrait;

    public $repository;

    public function __construct(BannerRepository $bannerRepository)
    {
        $this->repository = $bannerRepository;
    }

    public function handleEdit($request)
    {
        $conditions = ['id' => [get_value($request, 'id')], 'column' => [
            'title' => get_value($request, 'title'),
            'image' => $this->handleFileUpload(get_value($request, 'image'), get_value($request, 'old_image'))
        ]];
        return $this->repository->update($conditions);
    }

    /**
     * @param $request
     * @return void
     */
    public function handleCreate($request)
    {
        return $this->repository->create([
            'title' => get_value($request, 'title'),
            'image' => $this->handleFileUpload(get_value($request, 'image'))
        ]);
    }

    protected function handleFileUpload($newImage, $oldImage = null)
    {
        if ($newImage) {
            return (new LocalFileUploadService($newImage))->save(DefaultDefine::IMAGE_PATH, DefaultDefine::IMAGE_DISK_PATH, $oldImage)->getFileName();
        } else {
            return $oldImage;
        }

    }
}
