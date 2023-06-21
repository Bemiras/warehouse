<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Product
 * @package App\Models
 * @version May 17, 2023, 9:15 am UTC
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property float $stock
 * @property string $is_active
 */
class Product extends Model
{
    use HasFactory, SoftDeletes;

    public $table = 'products';

    public $fillable = [
        'category_id',
        'name',
        'stock',
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
        'stock' => 'decimal:2',
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
        'stock' => 'required|numeric',
        'is_active' => 'required|boolean'
    ];

    public static $ruleAttributes = [
        'category_id' => 'Kategoria',
        'name' => 'Nazwa',
        'stock' => 'Stan Magazynowy',
        'is_active' => 'Aktywny'
    ];

    public function category ()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}

