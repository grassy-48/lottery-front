@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')
<div class="column">
<section class="section" id="draw">
<h3 class="title">{{ $user['mail'] }}さんは{{ $user['point'] }}ポイント持っています</h3>
@if ($user['point'] >= 5)
  <h4 class="subtitle">5ポイント消費してくじを引きますか？ </h3>
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
<div class="column">
<section class="section" id="form">
<div class="notification is-danger">
    ポイントが不足しています！
</div>
<div class="column">
<p>いろんな山月ペーパーを集めて更にポイントをゲットしよう！</p>
</div>
</div>
@endif
<a class="button is-small" href="/"> TOPへもどる </a>
</div>
@endsection