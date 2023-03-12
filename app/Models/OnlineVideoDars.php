<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class OnlineVideoDars
 * @package App\Models
 * @version March 12, 2023, 8:00 pm UTC
 *
 * @property string $title
 * @property string $slug
 * @property file $img
 * @property textarea $content
 * @property string $url
 * @property select $is_active
 * @property string $created_at
 * @property string $yutube_video_url
 */
class OnlineVideoDars extends Model
{
    use SoftDeletes;

    public $table = 'online_video_dars';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'url' => 'string',
        'yutube_video_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'is_active' => 'required',
        'created_at' => 'required'
    ];

    
}
