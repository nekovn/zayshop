<?php

namespace App\Services;

use App\Enums\DefaultDefine;
use App\Helpers\Util\Helper;
use App\Models\Room;
use App\Repositories\ClientRepository;
use Illuminate\Support\Arr;

class ClientService
{
    use BaseServiceTrait;

    public $repository;

    public function __construct(ClientRepository $repository)
    {
        $this->repository = $repository;
    }

    public function logicalDelete(array $conditions)
    {
        foreach ($conditions['id'] as $id) {
            $roomImg = Room::find($id);
            $arrImg = $roomImg->imageRoom()->get()->toArray();
            foreach ($arrImg as $img) {
                Helper::deleteOldImage(DefaultDefine::IMAGE_ROOM_PATH, DefaultDefine::IMAGE_DISK_PATH, $img['name']);
            }
            $roomImg->imageRoom()->delete();
            $roomImg->spaceRoom()->detach();
        }

        return $this->repository->logicalDelete($conditions);
    }

    public function handleEdit($request)
    {
        $data = Arr::except($request, ['room_name', 'district_name', 'start_name', 'space_room_name', 'space_share_name', 'utility_room_name', 'image', 'old_image']);
        $conditions = ['id' => [$request['id']], 'column' => $data];
        $room = $this->repository->update($conditions);
        if ($room) {
            $img = $this->handleFileUpload(get_value($request, 'image'), get_value($request, 'old_image'));
            $roomImg = Room::find($request['id']);
            $roomImg->imageRoom()->update(head($img));
            $utilities = array_merge($request['space_room_name'], $request['space_share_name'], $request['utility_room_name']);
            $roomImg->spaceRoom()->sync($utilities);
        }
    }


    /**
     * @param $request
     * @return void
     */
    public function handleCreate($request)
    {
        //except:保存させないカラム
        $data = Arr::except($request, ['image']);
        $client = $this->repository->create($data);
        if ($client) {
            $client->imageCustomer()->createMany($this->handleFileUpload([$request['image']]));
        }
    }

    protected function handleFileUpload($newImage, $oldImage = null)
    {
        $arrImg = [];
        if ($newImage) {
            if (is_array(head($newImage))) {
                foreach (head($newImage) as $image) {
                    $arrImg[]['name'] = (new LocalFileUploadService($image))->save(DefaultDefine::IMAGE_CUSTOMER_PATH, DefaultDefine::IMAGE_DISK_PATH, $oldImage)->getFileName();
                }
                return $arrImg;
            }
        } else {
            //image upload無しの時、
            foreach ($oldImage as $img) {
                $arrImg[]['name'] = $img;
            }
            return $arrImg;
        }

    }
}
