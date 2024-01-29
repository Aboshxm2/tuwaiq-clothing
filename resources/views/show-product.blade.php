@php
$variant = $product->variants()->first();
@endphp

<x-app-layout>
    <div class="px-64 py-12">
        <div class="grid grid-cols-2 justify-center">
            <div class="">
                <div class="splide splide_1">
                    <div class="splide__track">
                        <ul class="splide__list">
                            @foreach($product->images()->orderBy('priority')->get() as $image)
                                <li class="splide__slide">
                                    <img class="object-scale-down mx-auto" src="/storage/{{ $image->path }}" style="width: 560px;height: 720px;">
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <form action="{{ route("cart.add") }}" method="post">
                @csrf
                <div class="p-24">
                    <div class="py-3">
                        <div class="text-3xl font-bold">{{ $product->name }}</div>
                        <div class="text-xl">{{ $variant->price }} USD</div>
                    </div>
                    <div class="py-3">
                        <div>{{ __("Size:") }}</div>
                        <div class="py-3 flex gap-8">
                            @php($first = true)
                            @foreach($product->variants()->get() as $variant)
                                <label class="cursor-pointer hover:bg-black hover:text-white p-3 rounded border-2 border-black">
                                    <input <?php if($first) {$first = false; echo("checked");} ?> class="hidden" type="radio" name="variant" value="{{ $variant->id }}">
                                    <span>{{ $variant->name }}</span>
                                </label>
                            @endforeach
                        </div>
                    </div>
                    @php($tags = $product->tags()->get())
                    @if(count($tags) > 0)
                        <div class="py-3">
                            <div>{{ __("Tags:") }}</div>
                            @foreach($tags as $tag)
                                <button>{{ $tag->name }}</button>
                            @endforeach
                        </div>
                    @endif
                    <div class="py-3">
                        <button type="submit" class="text-white bg-black p-3 w-full">{{ __("Add to Bag") }}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>
<style>
    label:has(input:checked) {
        color: white;
        background-color: black;
    }
</style>
