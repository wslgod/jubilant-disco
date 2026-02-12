@extends('layouts.dashboard')
@section('dashboard-content')
<h1>Disciplinas</h1>
@foreach($subjects as $subject)
    <div class="card mb-3"><div class="card-body">
        <h4><a href="{{ route('disciplines.show', $subject) }}">{{ $subject->name }}</a></h4>
        <p>{{ $subject->description }}</p>
    </div></div>
@endforeach
@endsection
