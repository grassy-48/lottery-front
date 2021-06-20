@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')
<div class="column">
<section class="section" id="form">
<div class="notification is-danger">
    ポイントが不足しています！
</div>
<div class="column">
<p>いろんな山月ペーパーを集めて更にポイントをゲットしよう！</p>
</div>
<a class="button is-small" href="/"> TOPへもどる </a>
</div>

@endsection