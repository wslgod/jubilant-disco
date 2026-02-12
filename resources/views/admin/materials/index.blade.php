@extends('layouts.dashboard')
@section('dashboard-content')
<a href="{{ route('admin.materials.create') }}" class="btn btn-primary mb-3">Novo material</a>
@foreach($materials as $material)<div>{{ $material->title }} ({{ $material->type }}) - <a href="{{ route('admin.materials.edit', $material) }}">Editar</a></div>@endforeach
@endsection
