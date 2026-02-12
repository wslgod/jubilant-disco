@extends('layouts.dashboard')
@section('dashboard-content')
<h1>Minha conta</h1>
@if($subscription)
<p>Plano: {{ ucfirst($subscription->plan) }} | Status: {{ $subscription->status }} | Expira em: {{ $subscription->expires_at->format('d/m/Y') }}</p>
@else
<p>Sem assinatura ativa.</p>
@endif
@endsection
