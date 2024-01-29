@props(['heading', 'products'])

<section class="splide my-24 mx-12">
    <div class="text-6xl py-12">{{ $heading }}</div>
    <div class="splide__track">
        <ul class="splide__list">
            @foreach($products as $product)
                <li class="splide__slide">
                    <x-product :$product></x-product>
                </li>
            @endforeach
        </ul>
    </div>
</section>
