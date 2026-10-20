@extends('layouts.app')

@section('title', 'Dashboard - Explore Ondo')

@section('content')
<div class="container">
    <h1 class="page-title">Dashboard</h1>

    <div class="stats">
        <div class="stat">
            <div class="label">Total Streets</div>
            <div class="value">{{ $totalStreets }}</div>
        </div>
        <div class="stat" style="border-left-color:#16a34a;">
            <div class="label">Popular Streets</div>
            <div class="value">{{ $popularCount }}</div>
        </div>
    </div>

    <div class="actions">
        <a href="{{ route('admin.streets.create') }}" class="btn-primary">+ Add Street</a>
        <a href="{{ route('admin.streets.index') }}" class="btn-secondary">Manage Streets</a>
    </div>

    <div class="table-box">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Popular</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentStreets as $street)
                    <tr>
                        <td>{{ $street->name }}</td>
                        <td>{{ $street->location }}</td>
                        <td>
                            @if($street->is_popular)
                                <span class="badge badge-yes">Yes</span>
                            @else
                                <span class="badge badge-no">No</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="4" style="text-align:center; color:#888;">No streets yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection