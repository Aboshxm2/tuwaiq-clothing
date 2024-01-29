@php($root = "product-variants")

<x-dashboard-layout2>
    <div class="flex flex-col justify-center items-center gap-16">
        <form action="{{ route("dashboard.$root.store") }}" method="post">
            @csrf
            <div class="flex justify-center items-center gap-3">
                <x-input-label for="name" :value="__('Name:')" />

                <x-text-input id="name" class="block mt-1 w-full"
                              type="text"
                              name="name"
                              required />

                <x-input-label for="price" :value="__('Price:')" />

                <x-text-input id="price" class="block mt-1 w-full"
                              type="number"
                              name="price"
                              required />

                <x-input-label for="stock" :value="__('Stock:')" />

                <x-text-input id="stock" class="block mt-1 w-full"
                              type="number"
                              name="stock"
                              required />

                <x-input-label for="product" :value="__('Product:')" />

                <select name="product_id" id="product">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>

                <x-primary-button>
                    {{ __('add') }}
                </x-primary-button>

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        </form>

        <div>
            <table>
                <tr>
                    <th class="border p-6">ID</th>
                    <th class="border p-6">Name</th>
                    <th class="border p-6">Price</th>
                    <th class="border p-6">Stock</th>
                    <th class="border p-6">Product</th>
                    <th class="border p-6">Actions</th>
                </tr>
                @foreach($variants as $variant)
                    <tr>
                        <th class="border p-6">{{ $variant->id }}</th>
                        <th class="border p-6">{{ $variant->name }}</th>
                        <th class="border p-6">{{ $variant->price }}</th>
                        <th class="border p-6">{{ $variant->stock }}</th>
                        <th class="border p-6">{{ $variant->product()->first()->name }}</th>
                        <th class="border p-6">
                            <a href="{{ route("dashboard.$root.edit", ["product_variant" => $variant->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form class="inline" action="{{ route("dashboard.$root.destroy", ["product_variant" => $variant->id]) }}" method="post">
                                @method("delete")
                                @csrf
                                <button type="submit"><i class="fa-solid fa-trash"></i></button></form>
                        </th>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</x-dashboard-layout2>
