<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">
<head>
    @include('partials.head')
    @livewireStyles
</head>
<body class="min-h-screen bg-white dark:bg-zinc-800">

    <!-- Sidebar -->
    <flux:sidebar sticky collapsible="mobile" class="border-e border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.header>
            {{-- Logo Sidebar --}}
            <x-app-logo :sidebar="true" href="{{ route('dashboard') }}" wire:navigate />
            <flux:sidebar.collapse class="lg:hidden" />
        </flux:sidebar.header>

        {{-- Sidebar Navigation --}}
        <flux:sidebar.nav>
            <flux:sidebar.group :heading="__('Platform')">
                <flux:sidebar.item icon="layout-grid" :href="route('dashboard')" :current="request()->routeIs('dashboard')" wire:navigate>
                    {{ __('Dashboard')  }}
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

        {{-- User Menu Desktop --}}
        <x-desktop-user-menu class="hidden lg:block" :name="auth()->user()->name" />
    </flux:sidebar>

    <!-- Header Desktop & Mobile -->
    <flux:header container class="sticky top-0 z-50 border-b border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900 flex items-center px-4">

        {{-- KIRI: Toggle sidebar & logo --}}
        <div class="flex items-center gap-2">
            <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />
            <x-app-logo href="{{ route('dashboard') }}" wire:navigate />
        </div>

        {{-- Spacer dorong konten kanan --}}
        <flux:spacer />

        {{-- KANAN: Search, Repo, Docs, Notifikasi, User --}}
        <div class="flex items-center gap-2 rtl:gap-x-reverse">
            <flux:tooltip :content="__('Search')" position="bottom">
                <flux:navbar.item class="!h-10 [&>div>svg]:size-5" icon="magnifying-glass" href="#" :label="__('Search')" />
            </flux:tooltip>

            <flux:tooltip :content="__('Repository')" position="bottom">
                <flux:navbar.item
                    class="h-10 max-lg:hidden [&>div>svg]:size-5"
                    icon="folder-git-2"
                    href="https://github.com/laravel/livewire-starter-kit"
                    target="_blank"
                    :label="__('Repository')"
                />
            </flux:tooltip>

            <flux:tooltip :content="__('Documentation')" position="bottom">
                <flux:navbar.item
                    class="h-10 max-lg:hidden [&>div>svg]:size-5"
                    icon="book-open-text"
                    href="https://laravel.com/docs/starter-kits#livewire"
                    target="_blank"
                    :label="__('Documentation')"
                />
            </flux:tooltip>

            {{-- 🔔 Notifikasi Ulang Tahun --}}
            <livewire:birthday-notification />

            {{-- Menu User --}}
            <x-desktop-user-menu :name="auth()->user()->name" />
        </div>
    </flux:header>

    <!-- Main Content -->
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