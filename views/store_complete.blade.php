@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', 'ポイントゲット完了')
@section('content')
<div class="column">
  <section class="hero is-primary" id="menu">
    <div class="column">
      <h1 class="title">ポイントをゲットしました！</h1>
      <hr>
      <div class="card">
        <div class="card-content">　 
          <div class="columns">
            <div class="column">
              <p>{{ $mail }} さんは今、 
                <strong>{{$point}} ポイント</strong>持ってます！
              </p>
              <p>いろんな山月ペーパーを集めて更にポイントをゲットしましょう！</p>
            </div>
          </div>
          <div class="column">
            <a class="button is-small" href="/">TOPへもどる </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection