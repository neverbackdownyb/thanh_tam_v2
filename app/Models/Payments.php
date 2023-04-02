<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Payments
 * @package App\Models
 * @version April 2, 2023, 3:52 pm UTC
 *
 * @property integer $treatment_id
 * @property integer $type
 * @property integer $total_money
 * @property string $note
 */
class Payments extends Model
{
    use HasFactory;

    public $table = 'payments';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'treatment_id',
        'type',
        'total_money',
        'note'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'treatment_id' => 'integer',
        'type' => 'integer',
        'total_money' => 'integer',
        'note' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'treatment_id' => 'required|integer',
        'type' => 'required|integer',
        'total_money' => 'required|integer',
        'note' => 'required|string|max:255',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];


}
