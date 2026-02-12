@extends('layouts.dashboard')
@section('dashboard-content')
<h1>Materiais</h1>
<div class="row g-3">
@foreach($materials as $material)
    <div class="col-md-4"><div class="card"><div class="card-body">
        <span class="badge bg-secondary">{{ strtoupper($material->type) }}</span>
        <h5>{{ $material->title }}</h5>
        <a href="{{ route('materials.show', $material) }}" class="btn btn-sm btn-primary">Abrir</a>
    </div></div></div>
@endforeach
</div>
{{ $materials->links() }}
@endsection
