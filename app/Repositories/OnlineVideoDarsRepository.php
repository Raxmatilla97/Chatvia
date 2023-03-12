<?php

namespace App\Repositories;

use App\Models\OnlineVideoDars;
use App\Repositories\BaseRepository;

/**
 * Class OnlineVideoDarsRepository
 * @package App\Repositories
 * @version March 12, 2023, 8:00 pm UTC
*/

class OnlineVideoDarsRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'slug',
        'img',
        'content',
        'url',
        'is_active',
        'created_at',
        'yutube_video_url'
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
        return OnlineVideoDars::class;
    }
}
