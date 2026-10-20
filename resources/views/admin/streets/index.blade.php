@extends('layouts.app')

@section('title', 'Manage Streets - Explore Ondo')

@section('content')
<div class="container">
    <h1 class="page-title">Manage Streets</h1>

    @if(session('success'))
        <div class="alert-success">{{ session('success') }}</div>
    @endif

    <div class="actions">
        <a href="{{ route('admin.streets.create') }}" class="btn-primary">+ Add New</a>
    </div>

    <div class="table-box">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Location</th>
                    <th>Popular</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($streets as $street)
                    <tr>
                        <td>
                            @if($street->image)
                                <img src="{{ asset('storage/' . $street->image) }}" alt="">
                            @else
                                <div style="width:56px;height:56px;background:#e5e7eb;border-radius:6px;"></div>
                            @endif
                        </td>
                        <td>{{ $street->name }}</td>
                        <td>{{ $street->location }}</td>
                        <td>
                            @if($street->is_popular)
                                <span class="badge badge-yes">Yes</span>
                            @else
                                <span class="badge badge-no">No</span>
                            @endif
                        </td>

                        <td style="text-align:right;">
                            <form method="POST" action="{{ route('admin.streets.destroy', $street) }}"
                                  style="display:inline"
                                  onsubmit="return confirm('Delete this street?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-danger">Delete</button>
                            </form>
                            <a href="{{ route('admin.streets.details', $street) }}" class="btn-secondary">Edit</a>

                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" style="text-align:center; color:#888;">No streets found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div class="pagination">
        {{ $streets->links() }}
    </div>
</div>
@endsection
