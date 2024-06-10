@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Edit Store</h1>
        <form action="{{ route('stores.update', $store->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="store_name">Store Name</label>
                <input type="text" class="form-control" id="store_name" name="store_name" value="{{ $store->store_name }}" required>
            </div>
            <div class="form-group">
                <label for="store_details">Store Details</label>
                <textarea class="form-control" id="store_details" name="store_details">{{ $store->store_details }}</textarea>
            </div>
            <button type="submit" class="btn btn-success">Update Store</button>
        </form>
    </div>
@endsection
