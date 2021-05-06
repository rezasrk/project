<?php 

namespace App\Repository;

use App\Models\Advertising;

class AdvertisingRepository
{
    public function repo()
    {
        return Advertising::query()->latest()->limit(5)->get();
    }
}