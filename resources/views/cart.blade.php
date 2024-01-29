@php use App\Models\ProductVariant;@endphp
@php
$total = 0;
@endphp
<x-app-layout>
    <div class="px-64 py-12">
        <div class="grid grid-cols-2 justify-center">
            <div>
                @php($cart = Session::get("cart", []))
                @foreach($cart as $variantId => $count)
                    @php($variant = ProductVariant::find($variantId))
                    @php($product = $variant->product()->first())
                    @php($total += $variant->price*$count)
                    <div class="flex gap-8">
                        <div>
                            <img src="/storage/{{ $product->images()->orderBy('priority')->first()->path }}" style="width: 280px;height: 360px;" alt="">
                        </div>
                        <div>
                            <div class="py-3 text-xl font-bold">{{ $product->name }}</div>
                            <div class="py-3 text-xl">Price: {{ $variant->price }}</div>
                            <div class="py-3 text-xl">Size: {{ $variant->name }}</div>
                            <div class="py-3 text-xl">
                                <label for="qty-{{ $variant->id }}">Quantity: </label>
                                <x-text-input type="number" name="quantity" value="{{ $count }}" id="qty-{{ $variant->id }}" wire:change="update()"></x-text-input>
                            </div>
                            <div class="py-3 text-xl text-red-500">
                                <form action="{{ route('cart.remove') }}" method="post">
                                    @csrf
                                    <input class="hidden" type="text" name="variant" value="{{ $variantId }}">
                                    <button type="submit"><i class="fa-solid fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class=" p-16">
                <form action="">
                    <div class="text-xl">Total: {{ $total }}</div>
                    <button class="w-full border-2 p-4 bg-black text-white my-4" type="submit">Checkout</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
