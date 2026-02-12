@extends('layouts.dashboard')
@section('dashboard-content')
<form method="POST" action="{{ route('admin.topics.store') }}">@csrf
<select class="form-select mb-2" name="subject_id">@foreach($subjects as $subject)<option value="{{ $subject->id }}">{{ $subject->name }}</option>@endforeach</select>
<input class="form-control mb-2" name="name" placeholder="Nome">
<textarea class="form-control mb-2" name="description"></textarea>
<button class="btn btn-primary">Salvar</button></form>
@endsection
