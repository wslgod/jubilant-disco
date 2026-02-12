@extends('layouts.dashboard')
@section('dashboard-content')
<h1>Alunos</h1>
@foreach($students as $student)
<form method="POST" action="{{ route('admin.students.toggle-status', $student) }}" class="d-flex gap-2 mb-2">@csrf @method('PATCH')
<span>{{ $student->name }} ({{ $student->email }}) - {{ $student->status ? 'Ativo' : 'Inativo' }}</span>
<button class="btn btn-sm btn-outline-primary">Alternar</button>
</form>
@endforeach
@endsection
