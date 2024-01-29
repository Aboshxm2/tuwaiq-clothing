@php($root = "products")

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

                <x-input-label for="description" :value="__('Description:')" />

                <x-text-input id="description" class="block mt-1 w-full"
                              type="text"
                              name="description"
                              required />

                <x-input-label for="category_id" :value="__('Category:')" />

                <select name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
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
                    <th class="border p-6">Description</th>
                    <th class="border p-6">Category</th>
                    <th class="border p-6">Actions</th>
                </tr>
                @foreach($products as $product)
                    <tr>
                        <th class="border p-6">{{ $product->id }}</th>
                        <th class="border p-6">{{ $product->name }}</th>
                        <th class="border p-6">{{ $product->description }}</th>
                        <th class="border p-6">{{ $product->category()->first()->name }}</th>
                        <th class="border p-6">
                            <a href="{{ route("dashboard.$root.edit", ["product" => $product->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                            <form class="inline" action="{{ route("dashboard.$root.destroy", ["product" => $product->id]) }}" method="post">
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
