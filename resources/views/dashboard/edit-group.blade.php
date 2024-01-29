<x-dashboard-layout2>
    <div class="flex flex-col justify-center items-center gap-16">
        <form action="{{ route('dashboard.groups.update', ["group" => $group->id]) }}" method="post">
            @method("patch")
            @csrf
            <div class="flex justify-center items-center gap-3">
                <x-input-label for="name" :value="__('Name:')" />

                <x-text-input id="name" class="block mt-1 w-full"
                              type="text"
                              name="name"
                              value="{{ $group->name }}"
                              required />

                <x-primary-button>
                    {{ __('update') }}
                </x-primary-button>

                <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
        </form>
    </div>
</x-dashboard-layout2>
