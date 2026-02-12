@extends('layouts.dashboard')
@section('dashboard-content')
<h1>{{ $subject->name }}</h1>
@foreach($subject->topics as $topic)
    <div class="mb-4">
        <h4>{{ $topic->name }}</h4>
        <ul>
            @foreach($topic->materials as $material)
                <li><a href="{{ route('materials.show', $material) }}">{{ $material->title }}</a></li>
            @endforeach
        </ul>
    </div>
@endforeach
@endsection
