@extends('layouts.app')
@section('content')
<div class="container-fluid">
    <div class="row min-vh-100">
        <aside class="col-md-2 bg-light p-3">
            <h5 class="text-primary-custom">Box OAB</h5>
            <ul class="nav flex-column gap-2">
                <li><a href="{{ route('dashboard') }}">Início</a></li>
                <li><a href="{{ route('disciplines.index') }}">Disciplinas</a></li>
                <li><a href="{{ route('materials.index') }}">Materiais</a></li>
                <li><a href="{{ route('account.show') }}">Minha conta</a></li>
            </ul>
        </aside>
        <main class="col-md-10 p-4">@yield('dashboard-content')</main>
    </div>
</div>
@endsection
