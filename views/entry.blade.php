@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')
<div class="column">
<section class="section" id="menu">
  <h1 class="title"> ペーパーを作って企画に参加する </h1>
  <hr>
  <div class="columns">
    <div class="column">
      <div class="buttons">
        <a href="/entry/info/evt" class="button is-rounded is-large">イベント会場で参加する</a>
      </div>
    </div>
    <div class="column">
      <div class="buttons">
        <a href="/entry/info/onl" class="button is-rounded is-large">オンラインでのみ参加する</a>
      </div>
    </div>
  </div>
  <p>※イベント用に作成いただいたペーパーをオンラインでも公開する場合は『イベント会場で参加する』をお選びください</p>
</section>
</div>
@endsection