@extends('layouts.app')
@section('content')
<div class="container py-5" style="max-width:520px">
    <h1>Recuperar senha</h1>
    <form method="POST" action="{{ route('password.email') }}">@csrf
        <input class="form-control mb-3" name="email" type="email" placeholder="E-mail" required>
        <button class="btn btn-primary">Enviar link</button>
    </form>
</div>
@endsection
