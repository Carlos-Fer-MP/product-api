<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Validation\ValidationException;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $data['product'] = Product::query()->groupBy('id','desc')->paginate(6);

        return view('product.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|View
     */
    public function create(): View|Factory|Application
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        $requestData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'availability' => 'required',
            'type' => 'required',
        ]);

        $product = new Product($requestData);
        $product->save();

        return redirect()->route('product.index')->with('success', 'Product has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param Product $product
     * @return Response
     */
    public function show(Product $product): Response
    {
        $data = Product::query()->findOrFail($product);

        return new Response($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Product $product
     * @return Application|Factory|View
     */
    public function edit(Product $product): View|Factory|Application
    {
        $product = Product::query()->findOrFail($product);

        return view('product.update', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return Redirector|RedirectResponse|Application|bool
     */
    public function update(Request $request, $id)
    {
        if (!$request->has('name')) {
            return redirect()->isInvalid();
        }

        $requestData = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'availability' => 'required',
            'type' => 'required',
        ]);

        Product::query()->Where('id', '=', $id)->update($requestData);

        return redirect('/product')->with('message', 'Product successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return Application|RedirectResponse|Redirector|void
     */
    public function destroy($id)
    {
        $product = Product::query()->find($id);

        if ($product === null) {
            return;
        }

        $product->delete();

        return redirect('/product')->with('message', 'Product successfully deleted!');
    }
}
