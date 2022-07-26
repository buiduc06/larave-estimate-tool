<?php

namespace App\Repositories;

use App\Models\Estimation;
use App\Repositories\BaseRepository;

/**
 * Class EstimationRepository
 * @package App\Repositories
 * @version July 26, 2022, 4:14 pm UTC
*/

class EstimationRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'template_id',
        'name',
        'user_id'
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
        return Estimation::class;
    }
}
