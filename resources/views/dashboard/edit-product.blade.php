@php($root = "products")

<x-dashboard-layout2>
    <div class="flex flex-col justify-center items-center gap-16">
        <form action="{{ route("dashboard.$root.update", ["product" => $product->id]) }}" method="post">
            @method("patch")
            @csrf
            <div class="flex justify-center items-center gap-3">
                <x-input-label for="name" :value="__('Name:')" />

                <x-text-input id="name" class="block mt-1 w-full"
                              type="text"
                              name="name"
                              value="{{ $product->name }}"
                              required />

                <x-input-label for="description" :value="__('Description:')" />

                <x-text-input id="description" class="block mt-1 w-full"
                              type="text"
                              name="description"
                              value="{{ $product->description }}"
                              required />

                <x-input-label for="category_id" :value="__('Category:')" />

                <select name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option <?php if($product->category_id === $category->id) echo("selected"); ?> value="{{ $category->id }}">{{ $category->name }}</option>
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
