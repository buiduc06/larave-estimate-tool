<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Template
 * @package App\Models
 * @version July 26, 2022, 4:10 pm UTC
 *
 * @property \App\Models\User $user
 * @property \App\Models\Layout $layout
 * @property integer $id
 * @property integer $layout_id
 * @property string $content
 * @property integer $user_id
 */
class Template extends Model
{
    use SoftDeletes;


    public $table = 'templates';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'layout_id',
        'content',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'layout_id' => 'integer',
        'content' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function layout()
    {
        return $this->belongsTo(\App\Models\Layout::class, 'layout_id', 'id');
    }
}
