@extends('layouts.admin')

@section('title', 'Create Role')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between">
            <h2 class="font-weight-bold">Create Role</h2>
            <a href="{{ route('roles.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left"></i> Back
            </a>
        </div>

        <div class="card shadow-sm mt-4">
            <div class="card-body">
                <form action="{{ route('roles.store') }}" method="POST">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="font-weight-bold">Name</label>
                        <input type="text" name="name" id="name" value="{{ old('name') }}"
                            class="form-control @error('name') is-invalid @enderror" placeholder="Enter Role Name">

                        @error('name')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mt-4">
                        <label class="font-weight-bold mb-1">Assign Permissions</label>
                        <div class="row">
                            @if ($permissions->isNotEmpty())
                                @foreach ($permissions->chunk(4) as $permissionRow)
                                    {{-- Har row me 4 permissions --}}
                                    <div class="col-12">
                                        <div class="row">
                                            @foreach ($permissionRow as $permission)
                                                <div class="col-md-3"> {{-- 4 columns per row --}}
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="permission[]"
                                                            value="{{ $permission->name }}"
                                                            id="permission-{{ $permission->id }}">
                                                        <label class="form-check-label"
                                                            for="permission-{{ $permission->id }}">
                                                            {{ $permission->name }}
                                                        </label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>

                    <div class="mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($errors->has('name'))
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'error',
                    title: 'Oops...',
                    text: '{{ $errors->first('name') }}',
                });
            });
        </script>
    @endif
@endsection
