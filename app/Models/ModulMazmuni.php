<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class ModulMazmuni
 * @package App\Models
 * @version February 25, 2023, 7:20 pm UTC
 *
 * @property string $title
 * @property string $slug
 * @property string $img
 * @property string $category
 * @property boolean $is_active
 * @property boolean $is_moderate
 * @property string $content
 * @property boolean $is_private
 * @property string $file
 * @property string $url_content
 * @property string $created_at
 */
class ModulMazmuni extends Model
{
    use SoftDeletes;

    public $table = 'modul_mazmunis';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
        'created_at',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'img' => 'string',
        'category' => 'string',
        'is_active' => 'boolean',
        'is_moderate' => 'boolean',
        'content' => 'string',
        'is_private' => 'boolean',
        'file' => 'string',
        'url_content' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        // 'img' => 'required',
        'category' => 'required',
        'is_active' => 'required',
        // 'is_moderate' => 'required',
        'content' => 'required',
        // 'is_private' => 'required',      
        // 'created_at' => 'required'
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
}
