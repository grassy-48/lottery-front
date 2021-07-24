@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', '景品ゲット') 
@section('content')
<div class="column">
  <section class="hero is-primary" id="menu">
    <div class="column">
      <h1 class="title"> 景品ゲット！</h1>
      <hr>
      <div class="card">
        <div class="card-content">
          <div class="content">
            <h3 class="is-3">5ポイント消費しました</h3>
            <h4 class="is-4">企画本部スタッフから景品をお受取りください。</h4>
            <br>
            <br>
            <p>{{ $user['mail'] }}さんは{{ $user['point'] }}ポイント持っています。</p>
            @if ($user['point'] >= 5) 
            <p>5ポイント消費してもう一度くじを引きますか？ </p>
            <br>
            <p>
              <strong>この操作は必ず、企画本部スタッフ前で行ってください。</strong>
            </p>
            <div class="columns">
              <div class="column">
                <div class="field">
                  <form action="/draw/evt/elected" method="post">
                    <input type="hidden" name="user_id" value="{{$user['id']}}">
                    <input class="button is-primary" type="submit" value="くじを引く">
                  </form>
                </div>
                <br>
                <div class="field">
                  <a class="button is-small" href="/">TOPへもどる </a>
                </div>
              </div>
            </div>
            @else 
              <div class="columns">
                <div class="column">
                  <p>いろんな山月ペーパーを集めて更にポイントをゲットしましょう！</p>
                </div>
              </div>
              <div class="column">
                <a class="button is-small" href="/">TOPへもどる </a>
              </div>
            @endif 
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection