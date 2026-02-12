@extends('layouts.app')
@section('content')
<div class="container py-5" style="max-width:520px">
    <h1>Criar conta</h1>
    <form method="POST" action="{{ route('register') }}">@csrf
        <input class="form-control mb-2" name="name" placeholder="Nome" required>
        <input class="form-control mb-2" name="email" type="email" placeholder="E-mail" required>
        <input class="form-control mb-2" name="password" type="password" placeholder="Senha" required>
        <input class="form-control mb-3" name="password_confirmation" type="password" placeholder="Confirmar senha" required>
        <button class="btn btn-primary w-100">Registrar</button>
    </form>
</div>
@endsection
