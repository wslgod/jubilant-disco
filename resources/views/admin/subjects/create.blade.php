@extends('layouts.dashboard')
@section('dashboard-content')
<form method="POST" action="{{ route('admin.subjects.store') }}">@csrf
<input class="form-control mb-2" name="name" placeholder="Nome">
<textarea class="form-control mb-2" name="description" placeholder="Descrição"></textarea>
<button class="btn btn-primary">Salvar</button></form>
@endsection
