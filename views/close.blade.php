@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', '終了') 
@section('content')
<div class="help column">
  <section class="hero is-primary" id="menu">
    <div class="column">
      <h1 class="title"> この企画は終了しました！</h1>
      <hr>
      <div class="card">
        <div class="card-content">
          <div class="content">
            <h3 class="is-3">配布可能な景品がなくなりました。</h3>
            <p>たくさんのご参加ありがとうございました！</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
