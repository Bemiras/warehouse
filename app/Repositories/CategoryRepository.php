<?php

namespace App\Repositories;

use App\Models\Category;


/**
 * Class CategoryRepository
 * @package App\Repositories
 * @version May 17, 2023, 9:15 am UTC
*/

class CategoryRepository extends BaseRepository
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
        return Category::class;
    }

    public function search($filters = [])
    {
        $category = Category::query();

        if ( array_key_exists('query', $filters) ) {
            $query = $filters['query'];
            $searchable = $this->getFieldsSearchable();
            $category->where(function ($q) use ($query, $searchable) {
                foreach ($searchable as $column) {
                    $q->orWhere($column, 'like', "%$query%");
                }
            });
        }

        foreach ($this->getFieldsSearchable() as $column) {
            if (array_key_exists($column, $filters)) {
                $q = $filters[$column];
                $category->orWhere($column, 'like', "%$q%");
            }
        }

        $category->orderBy('name');

        return $category->paginate(20);
    }
}
