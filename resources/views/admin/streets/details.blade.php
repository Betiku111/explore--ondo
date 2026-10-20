@extends('layouts.app')

@section('title', 'Edit Street - Explore Ondo')

@section('content')
<div class="container">
    <div class="form-box">
        <h1>Edit Street</h1>

        @if($errors->any())
            <div class="alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.streets.update', $street) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="field">
                <label for="name">Street Name</label>
                <input type="text" id="name" name="name" value="{{ old('name', $street->name) }}" required>
            </div>

            <div class="field">
                <label for="location">Location</label>
                <input type="text" id="location" name="location" value="{{ old('location', $street->location) }}" required>
            </div>

            <div class="field">
                <label for="description">Description</label>
                <textarea id="description" name="description" required>{{ old('description', $street->description) }}</textarea>
            </div>

            <div class="field">
                <label for="image">Image</label>
                @if($street->image)
                    <p>Current image:</p>
                    <img src="{{ asset('storage/' . $street->image) }}" alt="{{ $street->name }}" style="display:block;max-width:220px;height:auto;margin-bottom:12px;border-radius:8px;">
                @endif
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <div class="field checkbox">
                <input type="hidden" name="is_popular" value="0">
                <input type="checkbox" name="is_popular" id="is_popular" value="1" {{ old('is_popular', $street->is_popular) ? 'checked' : '' }}>
                <label for="is_popular" style="margin:0;">Mark as Popular</label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Save Changes</button>
                <a href="{{ route('admin.streets.index') }}" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
