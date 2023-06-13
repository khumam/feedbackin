<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased">
    <div class="min-h-screen flex flex-col justify-center items-center pt-6 sm:pt-0 bg-slate-300 px-4 md:px-0">
        <div class="text-center mb-6 w-full md:w-[600px]">
            <h1 class="font-medium text-3xl text-slate-800 mb-2">{{ $projectName ?? '' }}</h1>
            <p class="text-slate-500">{{ $projectDesc ?? '' }}</p>
        </div>
        <div class="w-full md:w-[600px] p-5 md:p-10 bg-slate-100 shadow-md overflow-hidden sm:rounded-md">
            {{ $slot }}
        </div>
    </div>
</body>

</html>
