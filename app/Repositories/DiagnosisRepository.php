<?php

namespace App\Repositories;

use App\Models\Diagnosis;
use App\Repositories\BaseRepository;

/**
 * Class DiagnosisRepository
 * @package App\Repositories
 * @version April 2, 2023, 3:50 pm UTC
*/

class DiagnosisRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'dentist',
        'note',
        'total_amount',
        'total_paid',
        'patient_id',
        'status'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Diagnosis::class;
    }
}
