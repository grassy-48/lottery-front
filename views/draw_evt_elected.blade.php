@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')
<div class="column">
<section class="section" id="draw">
<h1 class="title">5ポイント消費しました。</h1>
<h4 class="subtitle">企画本部スタッフから景品をお受取りください。</h3>
  <br>
  <p>{{ $user['mail'] }}さんは{{ $user['point'] }}ポイント持っています</p>
  <hr>
@if ($user['point'] >= 5)
  <p>5ポイント消費してもう一回くじを引きますか？ </p>
  <p>この操作は必ず、企画本部スタッフ前で行ってください。</p>
  <br>
  <div class="columns">
  <div class="column">
  <div class="field">
  <form action="/draw/evt/elected" method="post">
    <input type="hidden" name="user_id" value="{{$user['id']}}">
    <input class="button is-primary" type="submit" value="くじを引く">
  </form>
  </div>
  </div>
  </div>
@else
<p>いろんな山月ペーパーを集めて更にポイントをゲットしよう！</p>
@endif
<a class="button is-small" href="/"> TOPへもどる </a>
</div>
@endsection