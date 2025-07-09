<x-filament::layouts.app>
    <div class="flex items-center justify-center min-h-screen bg-gray-100">
        <div class="w-full max-w-md p-6 bg-white rounded-xl shadow-lg">
            <div class="text-center mb-6">
                <img src="{{ asset('logo_pkm.png') }}" class="w-20 mx-auto mb-2">
                <h2 class="text-xl font-bold">Login ke Sistem PMI</h2>
                <p class="text-sm text-gray-500">Silakan masukkan kredensial Anda</p>
            </div>

            {{ $this->form }}

            <div class="mt-4">
                <x-filament::button type="submit" form="login" class="w-full">
                    {{ __('Masuk') }}
                </x-filament::button>
            </div>
        </div>
    </div>
</x-filament::layouts.app>
