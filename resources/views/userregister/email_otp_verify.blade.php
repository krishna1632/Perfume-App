<x-guest-layout>
    @if (session('message'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
            <strong class="font-bold">{{ session('message') }}</strong>
        </div>
    @endif

    <form method="POST" action="{{ route('verify.otp.store') }}">
        @csrf
        @method('POST')
        <!-- Name -->
        <div>
            <x-input-label for="otp" :value="__('Emter OTP')" />
            <x-text-input id="otp" class="block mt-1 w-full" type="text" name="otp" :value="old('otp')" required
                autofocus autocomplete="otp" />
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button class="ms-4">
                {{ __('Verify and Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>
