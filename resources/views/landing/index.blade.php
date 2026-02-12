@extends('layouts.app')

@section('content')
<nav class="navbar navbar-light bg-white border-bottom">
    <div class="container"><a class="navbar-brand fw-bold text-primary-custom" href="#">Box OAB</a>
        <a class="btn btn-primary" href="{{ route('register') }}">Começar agora</a>
    </div>
</nav>
<section class="py-5 bg-light">
    <div class="container text-center py-5">
        <h1 class="display-5 fw-bold">Passe na OAB com método, não com sorte</h1>
        <p class="lead">Conteúdo por disciplina e assunto para avançar com estratégia.</p>
        <a href="{{ route('register') }}" class="btn btn-lg btn-primary">Começar agora</a>
    </div>
</section>
<div class="container py-5">
    <h2>Benefícios</h2><p>Organização por disciplina, materiais em PDF e resumos objetivos.</p>
    <h2 class="mt-4">Como funciona</h2><p>Assine um plano, acesse disciplinas, estude por assunto e acompanhe progresso.</p>
    <h2 class="mt-4">Planos</h2>
    <div class="row g-3">
        <div class="col-md-6"><div class="card"><div class="card-body"><h4>Semestral</h4><p>6 meses de acesso.</p></div></div></div>
        <div class="col-md-6"><div class="card"><div class="card-body"><h4>Anual</h4><p>12 meses de acesso.</p></div></div></div>
    </div>
</div>
@endsection
