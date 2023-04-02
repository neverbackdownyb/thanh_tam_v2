<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Partients
 * @package App\Models
 * @version April 2, 2023, 3:45 pm UTC
 *
 * @property string $phone
 * @property string $name
 * @property string $status
 * @property string $avatar
 * @property integer $birth_day
 * @property integer $province_id
 * @property integer $district
 * @property integer $ward
 * @property string $note
 */
class Partients extends Model
{
   // use SoftDeletes;

    use HasFactory;

    public $table = 'partients';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'phone',
        'name',
        'status',
        'avatar',
        'birth_day',
        'province_id',
        'district',
        'ward',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'phone' => 'string',
        'name' => 'string',
        'status' => 'string',
        'avatar' => 'string',
        'birth_day' => 'integer',
        'province_id' => 'integer',
        'district' => 'integer',
        'ward' => 'integer',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'phone' => 'required|string|max:255',
        'name' => 'required|string|max:255',
//        'status' => 'required|string|max:255',
//        'avatar' => 'required|string|max:255',
        'birth_day' => 'required|integer',
        'province_id' => 'required|integer',
        'district' => 'required|integer',
        'ward' => 'required|integer',
        'note' => 'required|string|max:255',
//        'created_at' => 'required',
//        'updated_at' => 'required'
    ];


}
