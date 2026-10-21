@extends('layouts.admin')
@section('content')

<div class="container-fluid px-4">
    <div class="my-3">
        <h1 class="mt-4 d-inline">Create User</h1>
        <a href="{{route('admin.users.index')}}" class="btn btn-danger float-end">Back</a>
    </div>

    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item"><a href="{{route('admin.index')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('admin.users.index')}}">Users</a></li>
        <li class="breadcrumb-item active">Create User</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-table me-1"></i>
            Create User
        </div>

        <div class="card-body">

            <form action="{{route('admin.users.store')}}" method="POST" enctype="multipart/form-data">
                @csrf

                <!-- Name -->
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="name"
                           id="name"
                           value="{{old('name')}}">

                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <!-- Position -->
                <div class="mb-3">
                    <label for="position" class="form-label">Position</label>
                    <select class="form-select @error('position') is-invalid @enderror"
                            name="position"
                            id="position">

                        <option value="">Choose Position</option>
                        <option value="admin" {{old('position') == 'admin' ? 'selected':''}}>Admin</option>
                        <option value="staff" {{old('position') == 'staff' ? 'selected':''}}>Staff</option>
                        <option value="user" {{old('position') == 'user' ? 'selected':''}}>User</option>
                    </select>

                    @error('position')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <!-- Office -->
                <div class="mb-3">
                    <label for="office" class="form-label">Office</label>
                    <input type="text"
                           class="form-control @error('office') is-invalid @enderror"
                           name="office"
                           id="office"
                           value="{{old('office')}}">

                    @error('office')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <!-- Age -->
                <div class="mb-3">
                    <label for="age" class="form-label">Age</label>
                    <input type="number"
                           class="form-control @error('age') is-invalid @enderror"
                           name="age"
                           id="age"
                           value="{{old('age')}}">

                    @error('age')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>

                <!-- Salary -->
                <div class="mb-3">
                    <label for="salary" class="form-label">Salary</label>
                    <input type="number"
                           class="form-control @error('salary') is-invalid @enderror"
                           name="salary"
                           id="salary"
                           value="{{old('salary')}}">

                    @error('salary')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
            <div class="d-grid gap-2">
                    <button class="btn btn-primary" type="submit">Save</button>
                </div>
            </form>

        </div>
    </div>
</div>

@endsection