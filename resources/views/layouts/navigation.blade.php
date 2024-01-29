<nav>
    <div class="sm:p-5 p-3 grid grid-cols-3 justify-center items-center shadow text-xl">
        <div>{{ __("lang") }}</div>
        <a href="{{ route('home') }}"><img src="/logo/logo.png" alt="" width="250" class="mx-auto"></a>
        <div>
            <ul class="flex gap-8 justify-end">
                @if(Gate::allows('admin'))
                    <li><a href="{{ route('dashboard.index') }}"><i class="fa-solid fa-table-columns"></i></a></li>
                @endif
                <li><a href="{{ route('search') }}"><i class="fa-solid fa-magnifying-glass"></i></a></li>
                <li><a href="{{ route('profile.edit') }}"><i class="fa-solid fa-user"></i></a></li>
                <li>
                    <a class="relative" href="{{ route('cart.index') }}">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span class="absolute bottom-1/2 text-red-500">{{ count(array_keys(Session::get('cart', [])) > 0 ? array_keys(Session::get('cart', [])) : "") }}</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="py-3 shadow">
        <ul class="flex justify-center items-center gap-x-16">
            @foreach($groups as $group)
                <li class="dropdown flex relative flex-col justify-between items-start">
                    <div>{{ __($group->name) }}</div>
                    <div class="hidden rounded z-10 p-3 absolute top-full bg-white shadow">
                        <ul class="flex flex-col gap-6">
                            @foreach($group->categories()->get() as $category)
                                <li><a href="{{ route('search', ["categories" => [$category->id]]) }}">{{ $category->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</nav>
<style>
    .dropdown:hover > * {display: block}
</style>
