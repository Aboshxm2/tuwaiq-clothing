@props(['product'])

<div class="mx-auto flex flex-col cursor-pointer" style="width: 280px;" onclick="window.location.href = '{{ route('product.show', ["product" => $product]) }}';">
    <img src="/storage/{{ $product->images()->orderBy('priority')->first()->path }}" style="width: 280px;height: 360px;">
    <div class="font-bold text-xl">{{ $product->name }}</div>
    <div>{{ __("{$product->variants()->first()->price} USD") }}</div>
</div>
