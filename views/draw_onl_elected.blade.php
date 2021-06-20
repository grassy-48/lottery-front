@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')
<div class="column">
<section class="section" id="draw">
<figure class="image is-500x500">
    <img src="http://placehold.jp/500x500.png?text=山月便箋を表示する">
</figure>
<br>

<h1 class="title">{{ $gift['grade'] }}賞、{{ $gift['name'] }}が当選しました！！</h1>
<h4 class="subtitle">必ず下記リンク先から発送手続きを行ってください。</h3>
<p>※このページを閉じるとリンクは再発行できません！</p>
<br>
<a class="button is-danger is-large" href="{{ $gift['booth'] }}"> Boothで発送手続きを行う </a>
<hr>
  <p>{{ $user['mail'] }}さんは{{ $user['point'] }}ポイント持っています。</p>
  <p>もう一度くじを引く前に、必ずboothページから発送手続きを行ってください。</p>
</section>
</div>

@endsection