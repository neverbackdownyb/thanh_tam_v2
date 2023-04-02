<?php

namespace App\Repositories;

use App\Models\Treatments;
use App\Repositories\BaseRepository;

/**
 * Class TreatmentsRepository
 * @package App\Repositories
 * @version April 2, 2023, 3:52 pm UTC
*/

class TreatmentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Treatments::class;
    }
}
