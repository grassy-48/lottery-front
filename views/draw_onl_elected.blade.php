@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', '景品ゲット') 
@section('content')
<div class="modal is-active">
  <div class="modal-background"></div>
  <button class="delete modal-close"></button>
  <div class="modal-content modal-card">
    <section class="modal-card-body">
      <figure class="image is-500x500">
        <img src="http://placehold.jp/500x500.png?text=山月便箋を表示する">
      </figure>
    </section>
  </div>
</div>
<div class="column">
  <section class="hero is-primary" id="menu">
    <div class="column">
      <h1 class="title">豪華景品＆山月ラブレターゲット！</h1>
      <hr>
      <div class="card">
        <div class="card-content">
          <div class="content">
            <a class="button is-large is-warning is-outlined modal-show">
            <span class="icon is-medium">
            <i class="fas fa-envelope"> </i>
            </span>
            <span> ラブレターを読む</span>
            </a>
            <h2 class="is-2">{{ $gift['grade'] }}賞、{{ $gift['name'] }}が当選しました！！</h2>
            <h4 class="is-4">必ず下記リンク先から発送手続きを行ってください。</h4>
            <p>※このページを閉じるとリンクは再発行できません！</p>
            <br>
            <a class="button is-dark is-medium" href="{{ $gift['booth'] }}"> Boothで発送手続きを行う</a>
            <hr>
            <p>{{ $user['mail'] }}さんは{{ $user['point'] }}ポイント持っています。</p>
            <p>もう一度くじを引く前に、必ずboothページから発送手続きを行ってください。</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<script type="text/javascript">
$(function(){
  $('.modal-show').click(function(){
    $('.modal').addClass('is-show');
  });
   $('.modal-close, .modal-background').click(function(){
    $('.modal').removeClass('is-show');
  });
});
//$(function() {
//  $('.modal-background, .modal-close').click(function() {
//    $('html').removeClass('is-clipped');
//    $(this).parent().removeClass('is-active');
//  });
//});
</script>
@endsection