<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - {{ config('app.name', 'Buku Induk') }}</title>
 
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="flex min-h-screen flex-col bg-[#FCFBF8] text-slate-800">
 
    @include('partials.header')
 
    @yield('content')
 
    @include('partials.footer')
 
</body>
</html>