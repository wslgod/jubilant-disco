@extends('layouts.dashboard')
@section('dashboard-content')
<form method="POST" action="{{ route('admin.subjects.update', $subject) }}">@csrf @method('PUT')
<input class="form-control mb-2" name="name" value="{{ $subject->name }}">
<textarea class="form-control mb-2" name="description">{{ $subject->description }}</textarea>
<button class="btn btn-primary">Atualizar</button></form>
@endsection
