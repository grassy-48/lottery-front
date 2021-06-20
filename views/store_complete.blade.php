@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')
<div class="column">
<section class="section" id="form">
<h1 class="title">
    ポイントをゲットしました！
</h1>
<hr>
<div class="column">
<p>{{ $mail }} さんは今、<strong> {{$point}} ポイント</strong>持ってます！</p>
<p>いろんな山月ペーパーを集めて更にポイントをゲットしよう！</p>
</div>
<div class="column">
<a class="button is-small" href="/"> TOPへもどる </a>
</div>
</div>
@endsection