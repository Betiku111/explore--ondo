@extends('layouts.app')

@section('title', $street->name . ' - Explore Ondo')

@section('content')

<section class="street-hero">
    @if($street->image)
        <img src="{{ asset('storage/' . $street->image) }}" alt="{{ $street->name }}">
    @endif
    <div class="title-overlay">
        <h1>{{ $street->name }}</h1>
    </div>
</section>

<div class="container">
    <div class="breadcrumb">
        <a href="{{ route('home') }}">Home</a>
        <span>/</span>
        {{ $street->name }}
    </div>

    <div class="street-detail">
        <p class="loc">{{ $street->location }}</p>
        <p>{{ $street->description }}</p>
    </div>
</div>

@endsection