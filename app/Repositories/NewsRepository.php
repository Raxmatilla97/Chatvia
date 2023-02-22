<?php

namespace App\Repositories;

use App\Models\News;
use App\Repositories\BaseRepository;

/**
 * Class NewsRepository
 * @package App\Repositories
 * @version February 22, 2023, 9:37 pm UTC
*/

class NewsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'slug',
        'img',
        'content',
        'is_active',
        'is_ready',
        'created_at',
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
        return News::class;
    }
}
