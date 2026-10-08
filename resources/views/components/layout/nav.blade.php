<nav class="border-b-2 border-border px-6">
    <div class="max-w-7xl mx-auto flex items-center justify-between h-16">
        <div>
            <a href="/" class="font-bold">
                <x-layout.logo-svg /></a>
        </div>
        @auth
            <div class="flex gap-x-5 items-center">
                <p>User is logged in!</p>
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn" type="submit">Log out</button>
                </form>
            </div>

        @else
            <div class="flex gap-x-5 items-center">
                <a href="/register" class="btn">Register</a>
                <a href="/login">Sign In</a>
            </div>
        @endauth
    </div>
</nav>