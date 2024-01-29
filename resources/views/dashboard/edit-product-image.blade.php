@php($root = "product-images")

<x-dashboard-layout2>
    <div class="flex flex-col justify-center items-center gap-16">
        <form action="{{ route("dashboard.$root.update", ["product_image" => $image]) }}" method="post">
            @method("patch")
            @csrf
            <div class="flex justify-center items-center gap-3">
                <x-input-label for="priority" :value="__('Priority:')" />

                <x-text-input id="priority" class="block mt-1 w-full"
                              type="number"
                              name="priority"
                              value="{{ $image->priority }}"
                              required />

                <x-input-label for="path" :value="__('Path:')" />

                <x-text-input id="path" class="block mt-1 w-full"
                              type="text"
                              name="path"
                              value="{{ $image->path }}"
                              required />

                <x-input-label for="product" :value="__('Product:')" />

                <select name="product_id" id="product">
                    @foreach($products as $product)
                        <option <?php if($image->product_id === $product->id) echo("selected"); ?> value="{{ $product->id }}">{{ $product->name }}</option>
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
