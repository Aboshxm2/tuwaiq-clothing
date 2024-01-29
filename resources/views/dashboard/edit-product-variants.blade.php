@php($root = "product-variants")

<x-dashboard-layout2>
    <div class="flex flex-col justify-center items-center gap-16">
        <form action="{{ route("dashboard.$root.update", ["product_variant" => $variant->id]) }}" method="post">
            @method("patch")
            @csrf
            <div class="flex justify-center items-center gap-3">
                <x-input-label for="name" :value="__('Name:')" />

                <x-text-input id="name" class="block mt-1 w-full"
                              type="text"
                              name="name"
                              value="{{ $variant->name }}"
                              required />

                <x-input-label for="price" :value="__('Price:')" />

                <x-text-input id="price" class="block mt-1 w-full"
                              type="number"
                              name="price"
                              value="{{ $variant->price }}"
                              required />

                <x-input-label for="stock" :value="__('Stock:')" />

                <x-text-input id="stock" class="block mt-1 w-full"
                              type="number"
                              name="stock"
                              value="{{ $variant->stock }}"
                              required />

                <x-input-label for="product" :value="__('Product:')" />

                <select name="product_id" id="product">
                    @foreach($products as $product)
                        <option <?php if($variant->product_id === $product->id) echo("selected"); ?> value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>

                <x-primary-button>
                    {{ __('update') }}
                </x-primary-button>

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        </form>
    </div>
</x-dashboard-layout2>
