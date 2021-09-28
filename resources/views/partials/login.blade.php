
<div class="ms-3">
    @if (Route::has('login'))
        <div class="">
            @auth
                <a href="{{ url('/dashboard') }}" class="text-decoration-none">Dashboard</a>
            @else
                <a href="{{ route('login') }}" class="text-decoration-none">Log in</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="text-decoration-none">Register</a>
                @endif
            @endauth
        </div>
    @endif
</div>

