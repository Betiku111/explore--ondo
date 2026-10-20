@extends('layouts.app')

@section('title', 'All Streets - Explore Ondo')

@section('content')

<!-- Page header -->
<section class="page-header">
    <div class="section-inner">
        <h1>All Streets in Ondo</h1>
        <p>Browse every street we've catalogued across the Sunshine State.</p>
    </div>
</section>

<!-- Streets grid -->
<section class="section">
    <div class="section-inner">

        {{-- Optional: search box --}}
        <div class="search-bar">
            <input type="text" id="street-search" placeholder="Search streets by name or location...">
        </div>

        @if($streets->count())
            <div class="grid" id="streets-grid">
                @foreach($streets as $street)
                    <a href="{{ route('streets.show', $street) }}"
                       class="card"
                       data-name="{{ strtolower($street->name) }}"
                       data-location="{{ strtolower($street->location) }}">

                        <div class="card-img">
                            @if($street->image)
                                <img src="{{ asset('storage/' . $street->image) }}" alt="{{ $street->name }}">
                            @else
                                {{ $street->name }}
                            @endif

                            @if($street->is_popular)
                                <span class="card-badge">Popular</span>
                            @endif
                        </div>

                        <div class="card-body">
                            <h3>{{ $street->name }}</h3>
                            <p class="loc">{{ $street->location }}</p>
                            <p class="desc">{{ \Illuminate\Support\Str::limit($street->description, 110) }}</p>
                        </div>
                    </a>
                @endforeach
            </div>

            <p id="no-results" style="text-align:center; color:#777; display:none; margin-top:30px;">
                No streets match your search.
            </p>
        @else
            <p style="text-align:center; color:#777;">No streets have been added yet.</p>
        @endif

    </div>
</section>

@endsection
