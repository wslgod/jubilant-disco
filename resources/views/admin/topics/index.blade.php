@extends('layouts.dashboard')
@section('dashboard-content')
<a href="{{ route('admin.topics.create') }}" class="btn btn-primary mb-3">Novo assunto</a>
@foreach($topics as $topic)<div>{{ $topic->name }} ({{ $topic->subject->name }}) - <a href="{{ route('admin.topics.edit', $topic) }}">Editar</a></div>@endforeach
@endsection
