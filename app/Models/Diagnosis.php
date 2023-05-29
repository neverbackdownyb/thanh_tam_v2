<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

/**
 * Class Diagnosis
 * @package App\Models
 * @version April 2, 2023, 3:50 pm UTC
 *
 * @property string $name
 * @property integer $dentist
 * @property string $note
 * @property integer $total_amount
 * @property integer $total_paid
 * @property integer $patient_id
 * @property integer $status
 */
class Diagnosis extends Model
{

    use HasFactory;

    public $table = 'diagnosis';

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'name',
        'dentist',
        'note',
        'total_amount',
        'total_paid',
        'patient_id',
        'status',
        'schedule'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'dentist' => 'integer',
        'note' => 'string',
        'total_amount' => 'integer',
        'total_paid' => 'integer',
        'patient_id' => 'integer',
        'status' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'name' => 'required|string|max:255',
        'dentist' => 'required|integer',
        'note' => 'required|string|max:255',
        'total_amount' => 'required|integer',
        'total_paid' => 'required|integer',
        'patient_id' => 'required|integer',
        'status' => 'required|integer',
        'created_at' => 'required',
        'updated_at' => 'required'
    ];

    public function partient()
    {
        return $this->hasOne(Partients::class, 'id', 'patient_id');
    }

    public function payments()
    {
        return $this->hasOne(Payments::class,  'patient_id', 'patient_id');
    }
}
