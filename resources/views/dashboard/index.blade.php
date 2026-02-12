@extends('layouts.dashboard')

@section('dashboard-content')
<h1>Continuar estudando</h1>
<div class="row g-3 mb-4">
    @foreach($subjects as $subject)
        <div class="col-md-4"><div class="card"><div class="card-body"><h5>{{ $subject->name }}</h5><small>{{ $subject->topics_count }} assuntos</small></div></div></div>
    @endforeach
</div>
<h2>Últimos materiais acessados</h2>
<ul>
    @forelse($recentAccess as $log)
        <li>{{ $log->material->title ?? 'Material removido' }} - {{ optional($log->accessed_at)->format('d/m/Y H:i') }}</li>
    @empty
        <li>Nenhum acesso recente.</li>
    @endforelse
</ul>
@endsection
