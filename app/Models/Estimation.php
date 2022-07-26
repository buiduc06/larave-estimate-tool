<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Estimation
 * @package App\Models
 * @version July 26, 2022, 4:14 pm UTC
 *
 * @property \App\Models\Template $template
 * @property \App\Models\User $user
 * @property integer $id
 * @property integer $template_id
 * @property string $name
 * @property integer $user_id
 */
class Estimation extends Model
{
    use SoftDeletes;


    public $table = 'estimations';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'template_id',
        'name',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'template_id' => 'integer',
        'name' => 'string',
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
    public function template()
    {
        return $this->belongsTo(\App\Models\Template::class, 'template_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'user_id', 'id');
    }
}
