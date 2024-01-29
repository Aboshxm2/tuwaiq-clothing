@php use App\Models\Category;use App\Models\Product; @endphp
<x-app-layout>
    <div class="h-[calc(100vh-250px)] bg-cover" style="background-image: url('hero.png');">
        <div class="w-full h-full backdrop-contrast-75">
            <h1 class="relative float-left top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 text-white text-6xl font-bold"
                style="max-width: 1000px">
                {{ __("Welcome to Tuwaiq Clothing - Where Style Meets Comfort") }}
            </h1>
        </div>
    </div>
    @php($products = Category::where('name', '=', 'Shoes')->first()->products()->get())
    <x-product-slider heading="Shoes" :$products></x-product-slider>
    @php($products = Category::where('name', '=', 'Bags')->first()->products()->get())
    <x-product-slider heading="Bags" :$products></x-product-slider>
    @php($products = Category::where('name', '=', 'Suits')->first()->products()->get())
    <x-product-slider heading="Suits" :$products></x-product-slider>
    @php($products = Product::all())
    <x-product-slider heading="You Might Like Also" :$products></x-product-slider>
</x-app-layout>
