@extends('layouts.app')

@section('title', 'Add Street - Explore Ondo')

@section('content')
<div class="container">
    <div class="form-box">
        <h1>Add New Street</h1>

        @if($errors->any())
            <div class="alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.streets.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="field">
                <label>Street Name</label>
                <input type="text" name="name" value="{{ old('name') }}" required>
            </div>

            <div class="field">
                <label>Location</label>
                <input type="text" name="location" value="{{ old('location') }}" required>
            </div>

            <div class="field">
                <label>Description</label>
                <textarea name="description" required>{{ old('description') }}</textarea>
            </div>

            <div class="field">
                <label>Image</label>
                <input type="file" name="image" accept="image/*">
            </div>

            <div class="field checkbox">
                <input type="checkbox" name="is_popular" id="is_popular" value="1" {{ old('is_popular') ? 'checked' : '' }}>
                <label for="is_popular" style="margin:0;">Mark as Popular</label>
            </div>

            <div class="form-actions">
                <button type="submit" class="btn-primary">Create</button>
                <a href="{{ route('admin.streets.index') }}" class="btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection