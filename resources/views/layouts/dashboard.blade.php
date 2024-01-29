<x-app-layout>
    <div class="w-full flex justify-between">
        <div class="grow py-12">
            {{ $slot }}
        </div>
        <div class="grid grid-rows-3 text-5xl bg-white">
            <div class="border-4 p-8"><a href="{{ route('dashboard.groups.index') }}">Groups</a></div>
            <div class="border-4 p-8"><a href="{{ route('dashboard.categories.index') }}">Categories</a></div>
            <div class="border-4 p-8"><a href="{{ route('dashboard.product-variants.index') }}">Product Variants</a></div>
            <div class="border-4 p-8"><a href="{{ route('dashboard.product-images.index') }}">Product Images</a></div>
            <div class="border-4 p-8"><a href="{{ route('dashboard.products.index') }}">Products</a></div>
        </div>
    </div>
</x-app-layout>
