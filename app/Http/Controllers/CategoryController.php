<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Laracasts\Flash;
use Response;


class CategoryController extends Controller
{
    /** @var $categoryRepository CategoryRepository */
    private $categoryRepository;

    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    /**
     * Display a listing of the Categories.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $filters = $request->get('filters') ?? [];

        $categories = $this->categoryRepository->search($filters);

        return view('categories.index')
            ->with('filters', $filters)
            ->with('categories', $categories);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateCategoryRequest $request
     *
     * @return Response
     */
    public function store(CreateCategoryRequest $request)
    {
        $input = $request->all();

        $category = $this->categoryRepository->create($input);

        flash(__('Category saved successfully'))->success();

        return redirect(route('categories.index'));
    }

    /**
     * Show the form for editing the specified Category.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            \flash(__('Category not found'))->error();

            return redirect(route('categories.index'));
        }

        return view('categories.edit')->with('category', $category);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param int $id
     * @param UpdateCategoryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCategoryRequest $request)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            \flash(__('Category not found'))->error();

            return redirect(route('categories.index'));
        }
        $input = $request->all();

        $category = $this->categoryRepository->update($input, $id);

        \flash(__('Category update successfully'))->success();

        return redirect(route('categories.index'));
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $category = $this->categoryRepository->find($id);

        if (empty($category)) {
            \flash(__('Category not found'))->error();

            return redirect(route('categories.index'));
        }

        $this->categoryRepository->delete($id);

        \flash(__('Category deleted successfully'))->success();

        return redirect(route('categories.index'));
    }
}
