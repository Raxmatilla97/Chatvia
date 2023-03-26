<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OnlineVideolar
 * @package App\Models
 * @version March 25, 2023, 7:27 pm UTC
 *
 * @property string $title
 * @property string $youtube
 */
class OnlineVideolar extends Model
{
    use SoftDeletes;

    public $table = 'online_videolars';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'title',
        'youtube',
        'videokurs_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'youtube' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    public function videokurs()
    {
        return $this->belongsTo('App\Models\OnlineVideoDars');
    }

    
}
