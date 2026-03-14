{{-- resources/views/components/app-logo.blade.php --}}
@props([
    'sidebar' => false,
    'href' => '#',
])

<a href="{{ $href }}" {{ $attributes->merge(['class' => 'flex items-center']) }}>
    @if ($sidebar)
        <div class="flex items-center space-x-2">
            <img src="{{ asset('assets/logo/Logo PMK NEW-1.png') }}" alt="Logo PMK" class="h-8 w-auto" />
            <span class="font-semibold text-lg">pmk.undipa</span>
        </div>
    @else
        <img src="{{ asset('assets/logo/Logo PMK NEW-1.png') }}" alt="Logo PMK" class="h-8 w-auto" />
         <span class="font-semibold text-lg ms-2">pmk.undipa</span>
    @endif
</a>