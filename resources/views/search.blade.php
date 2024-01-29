<x-app-layout>
    <div class="w-full px-36">
        <div class="flex justify-center items-center my-12">
            <form action="{{ route('search') }}">
                <div class="flex justify-between" style="width: 700px;">
                    <x-input-label for="search"></x-input-label>
                    <x-text-input class="grow" name="name" id="search" type="text" placeholder="Search"></x-text-input>
                    <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
{{--                    <div>--}}

{{--                    </div>--}}
                </div>
            </form>
        </div>

        <div class="grid grid-cols-3">
            @foreach($products as $product)
                <x-product :$product></x-product>
            @endforeach
        </div>
    </div>
</x-app-layout>
