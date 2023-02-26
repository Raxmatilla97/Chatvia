<?php

namespace App\Repositories;

use App\Models\ModulMazmuni;
use App\Repositories\BaseRepository;

/**
 * Class ModulMazmuniRepository
 * @package App\Repositories
 * @version February 25, 2023, 7:20 pm UTC
*/

class ModulMazmuniRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'slug',
        'img',
        'category',
        'is_active',
        'is_moderate',
        'content',
        'is_private',
        'file',
        'url_content',
        'created_at'
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
        return ModulMazmuni::class;
    }
}
