@extends('layouts.dashboard')
@section('dashboard-content')
<form method="POST" action="{{ route('admin.materials.store') }}" enctype="multipart/form-data">@csrf
<select class="form-select mb-2" name="topic_id">@foreach($topics as $topic)<option value="{{ $topic->id }}">{{ $topic->subject->name }} - {{ $topic->name }}</option>@endforeach</select>
<input class="form-control mb-2" name="title" placeholder="Título">
<select class="form-select mb-2" name="type"><option value="pdf">PDF</option><option value="resumo">Resumo</option></select>
<textarea class="form-control mb-2" name="summary_content" placeholder="Resumo"></textarea>
<input class="form-control mb-2" type="file" name="file" accept="application/pdf">
<div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="is_published" value="1" checked> Publicado</div>
<button class="btn btn-primary">Salvar</button></form>
@endsection
