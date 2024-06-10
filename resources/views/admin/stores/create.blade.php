@extends('admin.layouts.app')

@section('content')

<div class="container mt-5">
    <h1>Create Store</h1>

    <form action="{{ route('admin.stores.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="name">Store Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="3"></textarea>
        </div>

        <div class="form-group">
            <label for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control">
        </div>

        <div class="form-group">
            <label for="contact">Contact</label>
            <input type="text" name="contact" id="contact" class="form-control">
        </div>

        <div class="form-group">
            <label for="seller_id">Select Seller</label>
            <select name="seller_id" id="seller_id" class="form-control" required>
                <option value="">Select Seller</option>
                @foreach ($sellers as $seller)
                <option value="{{ $seller->id }}">{{ $seller->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Create Store</button>
    </form>
</div>

@endsection
