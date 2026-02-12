@extends('layouts.app')
@section('content')
<div class="container py-5" style="max-width:480px">
    <h1>Entrar</h1>
    <form method="POST" action="{{ route('login') }}">@csrf
        <input class="form-control mb-2" name="email" type="email" placeholder="E-mail" required>
        <input class="form-control mb-2" name="password" type="password" placeholder="Senha" required>
        <button class="btn btn-primary w-100">Login</button>
    </form>
    <a href="{{ route('password.request') }}">Esqueci minha senha</a>
</div>
@endsection
