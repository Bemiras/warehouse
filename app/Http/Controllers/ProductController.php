<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Laracasts\Flash;
use Response;


class ProductController extends Controller
{
    /** @var $productReposiitory ProductRepository */
    private $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
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

        $products = $this->productRepository->search($filters);

        return view('products.index')
                ->with('filters', $filters)
                ->with('products', $products);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {
        $input = $request->all();

        $product = $this->productRepository->create($input);

        flash('Pomyślnie dodano produkt')->success();

        return redirect(route('products.index'));
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
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            \flash('Produkt nie został znaleziony')->error();

            return redirect(route('products.index'));
        }

        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified Category in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            \flash('Produkt nie został znaleziony')->error();

            return redirect(route('products.index'));
        }
        $input = $request->all();

        $product = $this->productRepository->update($input, $id);

        \flash('Pomyślnie zaktualizowano produkt')->success();

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
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            \flash('Produkt nie został znaleziony')->error();

            return redirect(route('products.index'));
        }

        $this->productRepository->delete($id);

        \flash('Pomyślnie usunięto produkt')->success();

        return redirect(route('products.index'));
    }
}
