<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Category
 * @package App\Models
 * @version May 17, 2023, 9:15 am UTC
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $is_active
 */
class Category extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'categories';

    public $fillable = [
        'category_id',
        'name',
        'is_active'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'category_id' => 'integer',
        'name' => 'string',
        'is_active' => 'boolean'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'category_id' => 'nullable|integer',
        'name' => 'required|string',
        'is_active' => 'required|boolean'
    ];

    public function category ()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

//    public function products()
//    {
//        return $this->belongsTo(\App\Models\Products::class, 'category_id', 'id');
//    }
}

