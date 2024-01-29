<x-dashboard-layout2>
    <div class="flex flex-col justify-center items-center gap-16">
        <form action="{{ route('dashboard.groups.store') }}" method="post">
            @csrf
            <div class="flex justify-center items-center gap-3">
                <x-input-label for="name" :value="__('Name:')" />

                <x-text-input id="name" class="block mt-1 w-full"
                              type="text"
                              name="name"
                              required />

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
                    <th class="border p-6">Actions</th>
                </tr>
                    @foreach($groups as $group)
                        <tr>
                            <th class="border p-6">{{ $group->id }}</th>
                            <th class="border p-6">{{ $group->name }}</th>
                            <th class="border p-6">
                                <a href="{{ route('dashboard.groups.edit', ["group" => $group->id]) }}"><i class="fa-solid fa-pen-to-square"></i></a>
                                <form class="inline" action="{{ route('dashboard.groups.destroy', ["group" => $group->id]) }}" method="post">
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
