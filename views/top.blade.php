@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', 'くじシステムTOP')
@section('content')
<div class="column">
<section class="section" id="menu">
  <h1 class="title"> Menu </h1>
  <hr>
  <div class="columns">
    <div class="column">
      <div class="buttons">
        <a href="/entry" class="button is-rounded is-large">企画に参加する</a>
      </div>
    </div>
    <div class="column">
      <div class="buttons">
        <a href="/store" class="button is-rounded is-large">ポイントをためる</a>
      </div>
    </div>
    <div class="column">
      <div class="buttons">
        <a href="/draw" class="button is-rounded is-large">くじを引く</a>
      </div>
    </div>
  </div>
</section>
</div>
@endsection
