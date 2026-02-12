@extends('layouts.dashboard')
@section('dashboard-content')
<h1>Assinaturas</h1>
@foreach($subscriptions as $subscription)
<div>{{ $subscription->user->email }} - {{ ucfirst($subscription->plan) }} - {{ $subscription->status }} - {{ $subscription->expires_at->format('d/m/Y') }}</div>
@endforeach
@endsection
