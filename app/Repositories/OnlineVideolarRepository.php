<?php

namespace App\Repositories;

use App\Models\OnlineVideolar;
use App\Repositories\BaseRepository;

/**
 * Class OnlineVideolarRepository
 * @package App\Repositories
 * @version March 25, 2023, 7:27 pm UTC
*/

class OnlineVideolarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'title',
        'youtube'
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
        return OnlineVideolar::class;
    }
}
