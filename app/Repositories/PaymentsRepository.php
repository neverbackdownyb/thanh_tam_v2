<?php

namespace App\Repositories;

use App\Models\Payments;
use App\Repositories\BaseRepository;

/**
 * Class PaymentsRepository
 * @package App\Repositories
 * @version April 2, 2023, 3:52 pm UTC
*/

class PaymentsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'treatment_id',
        'type',
        'total_money',
        'note'
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
        return Payments::class;
    }
}
