<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Edit User') }}
            </h2>
            <a href="{{ route('user.list') }}" class="bg-slate-700 text-sm rounded-md px-4 py-2 text-white">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('user.update', $users->id) }}" method="POST">
                        @csrf
                        

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                            <input type="text" name="name" value="{{ $users->name }}" 
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 px-3 py-2">
                        </div>

                        <div class="mb-4">
                            <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                            <input type="email" name="email" value="{{ $users->email }}" 
                                class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-indigo-200 px-3 py-2" disabled>
                        </div>

                        <div class="mb-4">
    <label class="block text-gray-700 text-sm font-bold mb-2">Roles</label>
    @foreach($roles as $role)
        <div class="flex items-center mb-2">
            <input type="checkbox" name="roles[]" value="{{ $role->id }}" 
                class="mr-2 border-gray-300 rounded-md"
                @if($users->roles && $users->roles->pluck('id')->contains($role->id)) checked @endif>
            <span class="text-gray-900">{{ $role->name }}</span>
        </div>
    @endforeach
</div>





                        <div class="flex justify-end">
                            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md">
                                Update User
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
