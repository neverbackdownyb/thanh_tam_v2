<?php

namespace App\Services;

use App\Models\Province;

class ProvinceService
{
    public function getAllProvince() {
        $result = Province::all();
        return $result;
    }
}
