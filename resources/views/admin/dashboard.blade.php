@extends('layouts.dashboard')
@section('dashboard-content')
<h1>Painel Admin</h1>
<ul>
<li>Alunos: {{ $studentsCount }}</li>
<li>Disciplinas: {{ $subjectsCount }}</li>
<li>Materiais: {{ $materialsCount }}</li>
<li>Assinaturas ativas: {{ $activeSubscriptions }}</li>
</ul>
@endsection
