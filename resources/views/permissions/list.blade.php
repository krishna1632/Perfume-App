<x-app-layout>

    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Permissions/List') }}
            </h2>
            <a href="{{ route('permissions.create') }}" class="bg-slate-700 text-sm rounded-md px-4 py-2 text-white">
                <i class="fas fa-arrow-left"></i> Add Permissions
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    ID</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Created At</th>
                                <th
                                    class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @if ($permissions->isNotEmpty())
                                @foreach ($permissions as $permission)
                                    <tr>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $permission->id }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">{{ $permission->name }}</td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            {{ $permission->created_at->format('d M, Y') }}</td>
                                        <td class="px-6 py-4 text-center whitespace-nowrap">
                                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                                class="bg-yellow-500 text-white px-3 py-1 rounded text-sm">Edit</a>

                                            <form action="{{ route('permissions.destroy', $permission->id) }}"
                                                method="POST" class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="bg-red-500 text-white px-3 py-1 rounded text-sm"
                                                    onclick="return confirm('Are you sure you want to delete this permission?');">
                                                    Delete
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="4" class="text-center text-muted px-6 py-4">No Permissions Found
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                    <div class="my-3">
                        {{ $permissions->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
