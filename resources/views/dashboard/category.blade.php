@php($root = "categories")

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

                <x-input-label for="group" :value="__('Group:')" />

                <select name="group_id" id="group">
                    @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
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
                    <th class="border p-6">Group</th>
                    <th class="border p-6">Actions</th>
                </tr>
                    @foreach($categories as $category)
                        <tr>
                            <th class="border p-6">{{ $category->id }}</th>
                            <th class="border p-6">{{ $category->name }}</th>
                            <th class="border p-6">{{ $category->group()->first()->name }}</th>
                            <th class="border p-6">
                                <a href="{{ route("dashboard.$root.edit", ["category" => $category->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form class="inline" action="{{ route("dashboard.$root.destroy", ["category" => $category->id]) }}" method="post">
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
