<?php

namespace App\Repositories;
use App\Models\Banner;

class BannerRepository
{
    use BaseRepositoryTrait;

    protected function getModel()
    {
        return Banner::where([]);
    }
}
