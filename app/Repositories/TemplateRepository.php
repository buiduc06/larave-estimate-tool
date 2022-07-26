<?php

namespace App\Repositories;

use App\Models\Template;
use App\Repositories\BaseRepository;

/**
 * Class TemplateRepository
 * @package App\Repositories
 * @version July 26, 2022, 4:10 pm UTC
*/

class TemplateRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id',
        'layout_id',
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
        return Template::class;
    }
}
