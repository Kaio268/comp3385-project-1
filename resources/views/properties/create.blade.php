@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4">Add New Property</h2>
    {{-- Display success and error messages --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('properties.store') }}" method="POST" enctype="multipart/form-data">
        @csrf {{-- CSRF token for security --}}
        
        <div class="mb-3">
            <label for="title" class="form-label">Property Title</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ old('title') }}">
            @error('title')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" id="description" name="description" rows="3">{{ old('description') }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_of_rooms" class="form-label">No. of Rooms</label>
            <input type="number" class="form-control" id="no_of_rooms" name="no_of_rooms" placeholder="Enter number of rooms" value="{{ old('no_of_rooms') }}">
            @error('no_of_rooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="no_of_bathrooms" class="form-label">No. of Bathrooms</label>
            <input type="number" class="form-control" id="no_of_bathrooms" name="no_of_bathrooms" placeholder="Enter number of bathrooms" value="{{ old('no_of_bathrooms') }}">
            @error('no_of_bathrooms')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="text" class="form-control" id="price" name="price" placeholder="Enter price" value="{{ old('price') }}">
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Property Type</label>
            <select id="type" name="type" class="form-control">
                <option value="" disabled {{ old('type') ? '' : 'selected' }}>Choose...</option>
                <option value="House" {{ old('type') == 'House' ? 'selected' : '' }}>House</option>
                <option value="Apartment" {{ old('type') == 'Apartment' ? 'selected' : '' }}>Apartment</option>
            </select>
            @error('type')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" placeholder="Enter location" value="{{ old('location') }}">
            @error('location')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Photo</label>
            <input type="file" class="form-control-file" id="photo" name="photo">
            @error('photo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Add Property</button>
    </form>
</div>
@endsection
