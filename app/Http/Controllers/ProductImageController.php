<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductImage;
use App\Http\Requests\StoreProductImageRequest;
use App\Http\Requests\UpdateProductImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("dashboard.product-images", ["images" => ProductImage::all(), "products" => Product::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductImageRequest $request)
    {
        $valitated = $request->validated();
        unset($valitated["image"]);

        $path = $request->file('image')->storePubliclyAs('/product_images', uniqid().".png", 'public');

        $image = ProductImage::create(["path" => $path, ...$valitated]);

        $image->save();

        return redirect()->route('dashboard.product-images.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(ProductImage $productImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ProductImage $productImage)
    {
        return view("dashboard.edit-product-image", ["image" => $productImage, "products" => Product::all()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductImageRequest $request, ProductImage $productImage)
    {
        $productImage->update($request->validated());

        return redirect()->route('dashboard.product-images.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ProductImage $productImage)
    {
        $productImage->delete();

        return redirect()->route('dashboard.product-images.index');
    }
}
