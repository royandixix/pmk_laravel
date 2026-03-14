<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
    @livewireStyles
</head>
<body class="min-h-screen bg-[#09090b] flex flex-col antialiased">
    
    {{-- Navbar sekarang sudah include Sidebar di dalamnya --}}
    <x-user.navbar />

    <main class="flex-grow">
        <div class="w-full">
            {{ $slot ?? '' }}
        </div>
    </main>

    <x-user.footer />

    {{-- Urutan script flux dulu baru livewire --}}
    @fluxScripts
    @livewireScripts 
    @stack('scripts')
</body>
</html>