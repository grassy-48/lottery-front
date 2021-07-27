@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', 'メンテナンス中') 
@section('content')
<div class="help column">
  <section class="hero is-primary" id="menu">
    <div class="column">
      <h1 class="title">メンテナンス中です</h1>
      <hr>
      <div class="card">
        <div class="card-content">
          <p>ただいまメンテナンスを行っております。</p>
          <p>お手数おかけしますが、時間をおいてお試しください。</p>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
