<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Product;


/**
 * Class ProductRepository
 * @package App\Repositories
 * @version June 21, 2023, 9:15 am UTC
*/

class ProductRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
       'name'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Product::class;
    }

    public function search($filters = [])
    {
        $product = Product::query();

        if ( array_key_exists('query', $filters) ) {
            $query = $filters['query'];
            $searchable = $this->getFieldsSearchable();
            $product->where(function ($q) use ($query, $searchable) {
                foreach ($searchable as $column) {
                    $q->orWhere($column, 'like', "%$query%");
                }
            });
        }

        foreach ($this->getFieldsSearchable() as $column) {
            if (array_key_exists($column, $filters)) {
                $q = $filters[$column];
                $product->orWhere($column, 'like', "%$q%");
            }
        }

        $product->orderBy('name');

        return $product->paginate(20);
    }
}
