@extends('layouts.app')

@section('title', 'Explore Ondo')

@section('content')

<!-- Hero slider -->
<section class="hero">
    <div class="slide active">
        <img src="{{ asset('images/ondo4.jpg') }}" alt="Ondo">
    </div>
    <div class="slide">
        <img src="{{ asset('images/ondo1.jpg') }}" alt="Ondo">
    </div>
    <div class="slide">
        <img src="{{ asset('images/ondo2.jpg') }}" alt="Ondo">
    </div>

    <div class="overlay">
        <h1>Explore Ondo</h1>
        <p>Discover the Sunshine State's vibrant streets and rich heritage</p>
        <a href="#popular" class="btn">Explore Streets</a>
    </div>
</section>

<!-- Intro -->
<section class="section intro">
    <div class="section-inner">
        <h2>Welcome to Ondo City</h2>
        <p>
            Ondo State, known as the Sunshine State, is a treasure trove of natural wonders,
            cultural heritage, and warm hospitality. From the ancient Idanre Hills to the
            vibrant streets of Akure, every corner tells a story.
        </p>
    </div>
</section>

<!-- Popular streets -->
<section class="section" id="popular">
    <div class="section-inner">
        <h2>Popular Streets</h2>

        @if($popularStreets->count())
    <div class="grid">
        @foreach($popularStreets as $street)
            {{-- ...existing card markup... --}}
        @endforeach
    </div>

    <div style="text-align:center; margin-top:40px;">
        <a href="{{ route('streets.index') }}" class="btn-primary">View All Streets</a>
    </div>
@else
    <p style="text-align:center; color:#777;">No popular streets yet.</p>
@endif
    </div>
</section>

@endsection
