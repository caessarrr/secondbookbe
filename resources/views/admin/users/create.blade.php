@extends('admin.layouts.app')

@section('content')
    <h1>Create User</h1>
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" required>
        </div>
        <div>
            <label for="role_id">Role</label>
            <select id="role_id" name="role_id" required>
                @foreach ($roles as $role)
                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit">Create User</button>
    </form>
@endsection
