<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
    @livewireStyles
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">

    <flux:sidebar sticky collapsible="mobile" class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.header>
            <div class="hidden lg:flex">
                <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
            </div>
            <flux:sidebar.collapse class="lg:hidden" />
        </flux:sidebar.header>

        <flux:sidebar.nav>
            <flux:sidebar.group :heading="__('Platform')">
                <flux:sidebar.item icon="home" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard') }}
                </flux:sidebar.item>
            </flux:sidebar.group>

            <flux:sidebar.group :heading="__('Manajemen')">
                <flux:sidebar.item icon="users" :href="route('anggota.index')" :current="request()->routeIs('anggota.*')" wire:navigate>
                    {{ __('Daftar Anggota') }}
                </flux:sidebar.item>
                <flux:sidebar.item icon="cake" :href="route('anggota.ulang-tahun')" :current="request()->routeIs('anggota.ulang-tahun')" wire:navigate>
                    {{ __('Ulang Tahun') }}
                </flux:sidebar.item>
            </flux:sidebar.group>
        </flux:sidebar.nav>

        <flux:spacer />

        {{-- Perbaikan Baris 41: Menu Sidebar --}}
        @auth
            <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
        @endauth
    </flux:sidebar>

    <flux:header class="sticky top-0 z-50 border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 flex items-center px-4 lg:hidden">
        <flux:sidebar.toggle icon="bars-2" inset="left" />
        <div class="flex ml-2">
            <x-app-logo href="{{ route('dashboard') }}" wire:navigate />
        </div>
        <flux:spacer />
        <livewire:birthday-notification />
        
        {{-- Perbaikan Menu Mobile --}}
        @auth
            <x-desktop-user-menu :name="auth()->user()->name" />
        @endauth
    </flux:header>

    <flux:header class="hidden lg:flex sticky top-0 z-50 border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 items-center px-4">
        <flux:spacer />
        <div class="flex items-center gap-4 rtl:gap-x-reverse">
            <livewire:birthday-notification />
            
            {{-- Perbaikan Menu Desktop --}}
            @auth
                <x-desktop-user-menu :name="auth()->user()->name" />
            @else
                <flux:button href="/login" variant="ghost" size="sm">Login Admin</flux:button>
            @endauth
        </div>
    </flux:header>

    <flux:main container>
        <div class="py-10">
            {{ $slot }}
        </div>
        @include('layouts.app.footer')
    </flux:main>

    @fluxScripts
    @livewireScripts
    @stack('scripts')
</body>
</html>