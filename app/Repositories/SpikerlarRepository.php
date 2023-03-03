<?php

namespace App\Repositories;

use App\Models\Spikerlar;
use App\Repositories\BaseRepository;

/**
 * Class SpikerlarRepository
 * @package App\Repositories
 * @version February 27, 2023, 6:01 am UTC
*/

class SpikerlarRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'fish',
        'ish_joyi',
        'img',
        'about',
        'is_active',
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
        return Spikerlar::class;
    }
}
