<!-- resources/views/admin/stores/index.blade.php -->

@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Manage Stores</h1>
        <a href="{{ route('admin.stores.create') }}" class="btn btn-primary mb-3">Create Store</a>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Location</th>
                        <th>Contact</th>
                        <th>Seller</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stores as $store)
                        <tr>
                            <td>{{ optional($store->seller)->name }}</td>
                            <td>{{ $store->description }}</td>
                            <td>{{ $store->location }}</td>
                            <td>{{ $store->contact }}</td>
                            <td>{{ optional($store->seller)->name }}</td>
                            <td>
                                <a href="{{ route('admin.stores.edit', $store->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('admin.stores.destroy', $store->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
