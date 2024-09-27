<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>LARAVEL</title>
    @vite('resources/css/app.css')
</head>
<body class="font-sans">
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
            <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3"></header>
            <main class="mt-6 text-center">
                <div class="text-9xl">
                    Eloquent: Relaciones
                </div>
                <div class="flex flex-wrap justify-center mt-4">
                    @foreach ($users as $user)
                        <a href="{{ route('profile', $user->id) }}" class="mx-2 mt-2 text-lg">{{ $user->name }}</a>
                    @endforeach
                </div>
            </main>
            <footer class="py-16 text-center text-sm text-black"></footer>
        </div>
    </div>
</body>
</html>


