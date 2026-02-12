@extends('layouts.dashboard')
@section('dashboard-content')
<a href="{{ route('admin.subjects.create') }}" class="btn btn-primary mb-3">Nova disciplina</a>
@foreach($subjects as $subject)<div>{{ $subject->name }} - <a href="{{ route('admin.subjects.edit', $subject) }}">Editar</a></div>@endforeach
@endsection
