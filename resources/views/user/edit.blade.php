@extends('layouts.admin')

@section('title', 'Edit User')

@section('content')
    <h1 class="mt-4">Edit User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{ route('user.list') }}">Users</a></li>
        <li class="breadcrumb-item active">Edit User</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user-edit me-1"></i> Edit User Details
        </div>
        <div class="card-body">
            <form action="{{ route('user.update', $users->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" value="{{ old('name', $users->name) }}" class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email" value="{{ old('email', $users->email) }}" class="form-control"
                        required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Roles</label>
                    <div class="border p-3 rounded">
                        @foreach ($roles as $role)
                            <div class="form-check">
                                <input {{ $hasRoles->contains($role->id) ? 'checked' : '' }} type="checkbox"
                                    id="role-{{ $role->id }}" name="roles[]" value="{{ $role->name }}"
                                    class="form-check-input" @if ($users->roles->contains('id', $role->id)) checked @endif>
                                <label class="form-check-label" for="role-{{ $role->id }}">{{ $role->name }}</label>
                            </div>
                        @endforeach

                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('user.list') }}" class="btn btn-secondary me-2">
                        <i class="fas fa-arrow-left"></i> Back
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Update User
                    </button>
                </div>
            </form>

        </div>
    </div>
@endsection
