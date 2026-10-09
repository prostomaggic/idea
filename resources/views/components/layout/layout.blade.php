<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idea</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-foreground">
    <x-layout.nav />

    {{-- Flash Data --}}
    @if (session('success'))
        <div x-data="{show:true }" x-init="setTimeout(()=>show = false,3000)" x-show="show"
            x-transition.opacity.duration.1000ms
            class="fixed bottom-4 right-4 bg-primary text-primary-foreground px-6 py-3 rounded-xl shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <main class="max-w-7xl mx-auto px-6">
        {{ $slot }}
    </main>
</body>

</html>