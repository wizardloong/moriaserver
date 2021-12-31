    <!-- The only way to do great work is to love what you do. - Steve Jobs -->


<div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
    <a href="{{ route('index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">{{ __('pages.index') }}</a>

    @auth
        <a href="{{ url('/dashboard') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Личный кабинет</a>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Выйти</button>
        </form>
    @else
        <a href="{{ route('login') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Вход</a>

        @if (Route::has('register'))
            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Регистрация</a>
        @endif
    @endauth
</div>
