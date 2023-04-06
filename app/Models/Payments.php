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

    const HINH_THUC_TIEN_MAT = 0;
    const HINH_THUC_CHUYEN_KHOAN = 1;
    public static $listPaymentType = [
        self::HINH_THUC_TIEN_MAT => 'Tiền Mặt',
        self::HINH_THUC_CHUYEN_KHOAN => 'Chuyển Khoản'
    ];

    protected $dates = ['deleted_at'];



    public $fillable = [
        'diagnosis_id',
        'type',
        'total_money',
        'note',
        'patient_id'
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

    public function diagnosis()
    {
        return $this->hasOne(Diagnosis::class, 'id', 'diagnosis_id');
    }
}
