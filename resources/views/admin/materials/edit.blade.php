@extends('layouts.dashboard')
@section('dashboard-content')
<form method="POST" action="{{ route('admin.materials.update', $material) }}" enctype="multipart/form-data">@csrf @method('PUT')
<select class="form-select mb-2" name="topic_id">@foreach($topics as $topic)<option value="{{ $topic->id }}" @selected($material->topic_id===$topic->id)>{{ $topic->name }}</option>@endforeach</select>
<input class="form-control mb-2" name="title" value="{{ $material->title }}">
<select class="form-select mb-2" name="type"><option value="pdf" @selected($material->type==='pdf')>PDF</option><option value="resumo" @selected($material->type==='resumo')>Resumo</option></select>
<textarea class="form-control mb-2" name="summary_content">{{ $material->summary_content }}</textarea>
<input class="form-control mb-2" type="file" name="file" accept="application/pdf">
<div class="form-check mb-2"><input class="form-check-input" type="checkbox" name="is_published" value="1" @checked($material->is_published)> Publicado</div>
<button class="btn btn-primary">Atualizar</button></form>
@endsection
