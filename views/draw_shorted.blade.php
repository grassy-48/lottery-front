@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', 'ポイント不足') 
@section('content')
<div class="column">
  <section class="hero is-primary" id="menu">
    <div class="column">
      <div class="notification is-warning"> ポイントが不足しています！ </div>
      <div class="card">
        <div class="card-content">
          <div class="columns">
            <div class="column">
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