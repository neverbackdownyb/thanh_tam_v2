<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    use HasFactory;

    protected $table = 'district'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = ['district_id', 'province_id', 'name']; // Các trường dữ liệu cho phép gán


}
