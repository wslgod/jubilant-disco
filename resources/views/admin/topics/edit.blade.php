@extends('layouts.dashboard')
@section('dashboard-content')
<form method="POST" action="{{ route('admin.topics.update', $topic) }}">@csrf @method('PUT')
<select class="form-select mb-2" name="subject_id">@foreach($subjects as $subject)<option value="{{ $subject->id }}" @selected($topic->subject_id === $subject->id)>{{ $subject->name }}</option>@endforeach</select>
<input class="form-control mb-2" name="name" value="{{ $topic->name }}">
<textarea class="form-control mb-2" name="description">{{ $topic->description }}</textarea>
<button class="btn btn-primary">Atualizar</button></form>
@endsection
