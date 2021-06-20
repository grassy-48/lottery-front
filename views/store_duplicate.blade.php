@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')
<div class="column">
<section class="section" id="form">
<div class="notification is-danger">
    すでに読み取り済のコードです！
</div>
<div class="column">
<p>いろんな山月ペーパーを集めて更にポイントをゲットしよう！</p>
</div>
<div class="column">
<a class="button is-small" href="/"> TOPへもどる </a>
</div>
</div>
@endsection