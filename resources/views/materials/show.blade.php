@extends('layouts.dashboard')
@section('dashboard-content')
<h1>{{ $material->title }}</h1>
@if($material->type === 'pdf')
    <a class="btn btn-primary" href="{{ $temporaryUrl }}">Abrir PDF protegido</a>
@else
    <article class="card"><div class="card-body">{!! nl2br(e($material->summary_content)) !!}</div></article>
@endif
@endsection
