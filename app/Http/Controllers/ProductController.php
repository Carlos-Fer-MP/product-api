<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $data['product'] = Product::all();

        return new  response($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function store(Request $request): JsonResponse
    {
        $requestData = $request->all();

        $product = new Product($requestData);
        $product->save();

        //This isn't a good CQRS way to do things but, serves us to confirm that the product was created.
        return response()->json(["product" => $product]);
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
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param $id
     * @return JsonResponse
     */
    public function update(Request $request, $id): JsonResponse
    {
        $requestData = $request->all();

        if (!$requestData['name']) {
            return response()->json(["message" => "There's no matching product in our database"]);
        }

        Product::query()->Where('uuid', '=', $id)->update($requestData);
        //This isn't CQRS friendly but, serves us to confirm that the product was updated.
        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return JsonResponse
     */
    public function destroy($id): JsonResponse
    {
        $product = Product::query()->find($id);

        if ($product === null) {
            return response()->json(["message" => "There's no matching product in our database"]);
        }

        $product->delete();

        return response()->json(["message" => "The product was successfully deleted"]);
    }
}
