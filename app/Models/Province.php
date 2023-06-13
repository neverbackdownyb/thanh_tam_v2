<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    protected $table = 'province'; // Tên bảng trong cơ sở dữ liệu

    protected $fillable = ['province_id', 'name']; // Các trường dữ liệu cho phép gán


}
