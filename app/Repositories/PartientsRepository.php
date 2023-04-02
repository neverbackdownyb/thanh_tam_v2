<?php

namespace App\Repositories;

use App\Models\Partients;
use App\Repositories\BaseRepository;

/**
 * Class PartientsRepository
 * @package App\Repositories
 * @version April 2, 2023, 3:45 pm UTC
*/

class PartientsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
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
        return Partients::class;
    }
}
