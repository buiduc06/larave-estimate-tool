<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * Class Layout
 * @package App\Models
 * @version July 26, 2022, 4:08 pm UTC
 *
 * @property integer $id
 * @property string $content
 * @property integer $user_id
 */
class Layout extends Model
{
    use SoftDeletes;


    public $table = 'layouts';
    

    protected $dates = ['deleted_at'];



    public $fillable = [
        'id',
        'content',
        'user_id',
        'file_path'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'content' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'layout_file' => 'required|file',
        
    ];

    
}
