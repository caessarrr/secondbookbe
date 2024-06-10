@extends('admin.layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Store</h1>
        <form action="{{ route('admin.stores.update', $store->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Store Name</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $store->name }}" required>
            </div>
            <div class="form-group">
                <label for="description">Store Description</label>
                <textarea class="form-control" id="description" name="description">{{ $store->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="{{ $store->location }}">
            </div>
            <div class="form-group">
                <label for="contact">Contact</label>
                <input type="text" class="form-control" id="contact" name="contact" value="{{ $store->contact }}">
            </div>
            <button type="submit" class="btn btn-success">Update Store</button>
        </form>
    </div>
@endsection
