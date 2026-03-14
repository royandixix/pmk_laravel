<x-layouts::auth>
    <div class="flex flex-col gap-6">
       <x-auth-header 
            :title="__('Selamat datang di Web Admin PMK')" 
            :description="__('Silakan masukkan email dan kata sandi Anda untuk mengakses dashboard')" 
        />

        <!-- Status Sesi -->
        <x-auth-session-status class="text-center" :status="session('status')" />

        <form method="POST" action="{{ route('login.store') }}" class="flex flex-col gap-6">
            @csrf

            <!-- Alamat Email -->
            <flux:input
                name="email"
                :label="__('Alamat email')"
                :value="old('email')"
                type="email"
                required
                autofocus
                autocomplete="email"
                placeholder="email@contoh.com"
            />

            <!-- Kata Sandi -->
            <div class="relative">
                <flux:input
                    name="password"
                    :label="__('Kata sandi')"
                    type="password"
                    required
                    autocomplete="current-password"
                    :placeholder="__('Kata sandi')"
                    viewable
                />

                @if (Route::has('password.request'))
                    <flux:link class="absolute top-0 text-sm end-0" :href="route('password.request')" wire:navigate>
                        {{ __('Lupa kata sandi Anda?') }}
                    </flux:link>
                @endif
            </div>

            <!-- Ingat Saya -->
            <flux:checkbox name="remember" :label="__('Ingat saya')" :checked="old('remember')" />

            <div class="flex items-center justify-end">
                <flux:button variant="primary" type="submit" class="w-full" data-test="login-button">
                    {{ __('Masuk') }}
                </flux:button>
            </div>
        </form>

        @if (Route::has('register'))
            <div class="space-x-1 text-sm text-center rtl:space-x-reverse text-zinc-600 dark:text-zinc-400">
                <span>{{ __('Belum punya akun?') }}</span>
                <flux:link :href="route('register')" wire:navigate>{{ __('Daftar') }}</flux:link>
            </div>
        @endif
    </div>
</x-layouts::auth>