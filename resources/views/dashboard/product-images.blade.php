@php($root = "product-images")

<x-dashboard-layout2>
    <div class="flex flex-col justify-center items-center gap-16">
        <form action="{{ route("dashboard.$root.store") }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="flex justify-center items-center gap-3">
                <x-input-label for="priority" :value="__('Priority:')" />

                <x-text-input id="priority" class="block mt-1 w-full"
                              type="number"
                              name="priority"
                              required />

                <x-input-label for="image" :value="__('Image:')" />

                <x-text-input id="image" class="block mt-1 w-full"
                              type="file"
                              name="image"
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
                    <th class="border p-6">Priority</th>
                    <th class="border p-6">Path</th>
                    <th class="border p-6">Preview</th>
                    <th class="border p-6">Product</th>
                    <th class="border p-6">Actions</th>
                </tr>
                @foreach($images as $image)
                    <tr>
                        <th class="border p-6">{{ $image->id }}</th>
                        <th class="border p-6">{{ $image->priority }}</th>
                        <th class="border p-6">{{ $image->path }}</th>
                        <th class="border p-6"><img style="width: 50px; height: 50px;" src="/storage/{{ $image->path }}" alt=""></th>
                        <th class="border p-6">{{ $image->product()->first()->name }}</th>
                        <th class="border p-6">
                            <a href="{{ route("dashboard.$root.edit", ["product_image" => $image->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form class="inline" action="{{ route("dashboard.$root.destroy", ["product_image" => $image->id]) }}" method="post">
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
