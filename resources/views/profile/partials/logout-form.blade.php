<section class="space-y-6">
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Logout') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('When you choose to log out, you will be signed out of your current session, ensuring that no one else can access your account from the current device. Please note that logging out does not delete your account or its associated data.') }}
        </p>
    </header>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <x-primary-button>{{ __('Logout') }}</x-primary-button>
    </form>
</section>
