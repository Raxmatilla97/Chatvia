<?php

namespace App\Models;





use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class News
 * @package App\Models
 * @version February 22, 2023, 9:37 pm UTC
 *
 * @property string $title
 * @property string $slug
 * @property string $img
 * @property string $content
 * @property integer $is_active
 * @property boolean $is_ready
 * @property string $created_at
 * @property integer $user_id
 */
class News extends Model
{
    use SoftDeletes;
  

    public $table = 'news';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'title' => 'string',
        'slug' => 'string',
        'img' => 'string',
        'content' => 'string',
        'is_active' => 'integer',
        'is_ready' => 'boolean',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',        
        'img' => 'required',
        'content' => 'required',
        'is_active' => 'required'
       
    ];

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

   
    
}
