<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Treatments
 * @package App\Models
 * @version April 2, 2023, 3:52 pm UTC
 *
 * @property integer $diagnosis_id
 * @property integer $cure
 * @property integer $unit_price
 * @property integer $quality
 * @property integer $discount
 * @property integer $total_amount
 * @property integer $note
 * @property integer $status
 */
class Treatments extends Model
{

    use HasFactory;

    public $table = 'treatments';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'diagnosis_id',
        'cure',
        'unit_price',
        'quality',
        'discount',
        'total_amount',
        'note',
        'status'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'diagnosis_id' => 'integer',
        'cure' => 'integer',
        'unit_price' => 'integer',
        'quality' => 'integer',
        'discount' => 'integer',
        'total_amount' => 'integer',
        'note' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'diagnosis_id' => 'required|integer',
        'cure' => 'required|integer',
        'unit_price' => 'required|integer',
        'quality' => 'required|integer',
        'discount' => 'required|integer',
        'total_amount' => 'required|integer',
        'note' => 'required|integer',
        'status' => 'required|integer',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];


}
