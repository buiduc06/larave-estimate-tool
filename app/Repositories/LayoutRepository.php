<?php

namespace App\Repositories;

use App\Models\Layout;
use App\Repositories\BaseRepository;

/**
 * Class LayoutRepository
 * @package App\Repositories
 * @version July 26, 2022, 4:08 pm UTC
*/

class LayoutRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'content',
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
        return Layout::class;
    }
}
