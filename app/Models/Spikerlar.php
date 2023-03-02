<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Spikerlar
 * @package App\Models
 * @version February 27, 2023, 6:01 am UTC
 *
 * @property string $fish
 * @property string $ish_joyi
 * @property string $about
 * @property boolean $is_active
 * @property string $created_at
 */
class Spikerlar extends Model
{
    use SoftDeletes;

    public $table = 'spikerlars';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'fish',
        'ish_joyi',
        'about',
        'img',
        'is_active',
        'created_at',
        '_token',
        '_method'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'fish' => 'string',
        'img' => 'string',
        'ish_joyi' => 'string',
        'about' => 'string',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'fish' => 'required',
        'img' => 'required',
        'ish_joyi' => 'required',
        'about' => 'required',
      
    ];

    
}
