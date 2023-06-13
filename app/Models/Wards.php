<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wards extends Model
{
    use HasFactory;

    protected $table = 'wards'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = ['wards_id', 'district_id', 'name']; // Các trường dữ liệu cho phép gán


}
