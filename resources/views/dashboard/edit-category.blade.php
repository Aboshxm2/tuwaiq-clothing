@php($root = "categories")

<x-dashboard-layout2>
    <div class="flex flex-col justify-center items-center gap-16">
        <form action="{{ route("dashboard.$root.update", ["category" => $category]) }}" method="post">
            @method("patch")
            @csrf
            <div class="flex justify-center items-center gap-3">
                <x-input-label for="name" :value="__('Name:')" />

                <x-text-input id="name" class="block mt-1 w-full"
                              type="text"
                              name="name"
                              value="{{ $category->name }}"
                              required />

                <x-input-label for="group" :value="__('Group:')" />

                <select name="group_id" id="group">
                    @foreach($groups as $group)
                        <option <?php if($category->group_id === $group->id) echo("selected"); ?> value="{{ $group->id }}">{{ $group->name }}</option>
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
