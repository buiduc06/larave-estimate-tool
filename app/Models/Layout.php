<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
        'file_path',
        'name'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id'        => 'integer',
        'content'   => 'string',
        'name'      => 'string',
        'file_path' => 'string',
        'user_id'   => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'layout_file' => 'required|file',
        'name'        => 'nullable|max:250',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
