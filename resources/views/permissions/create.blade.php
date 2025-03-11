<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permissions/Create') }}
            </h2>
            <a href="{{ route('permissions.index') }}" class="bg-slate-700 text-sm rounded-md px-4 py-2 text-white">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('permissions.store') }}" method="POST">
                        @csrf
                        <label for="" class="text-lg font-medium">Name</label>
                        <div class="my-3">
                            <input value="{{ old('name') }}" type="text" name="name" id=""
                                class="border-gray-300 shadow-sm w-1/2 rounded-lg" placeholder="Name of Permissions">
                            @error('name')
                                <p class="text-red-400 font-medium">{{ $message }}</p>
                            @enderror
                        </div>
                        <button class="bg-slate-700 text-sm rounded-md px-4 py-2 text-white">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
