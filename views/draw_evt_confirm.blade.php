@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', 'くじ確認画面') 
@section('content')
<div class="column">
  <section class="hero is-primary" id="menu">
    <div class="column">
    @if ($user['point'] >= 5) 
      <h1 class="title">必ずご確認ください！</h1>
      <hr>
      <div class="card">
        <div class="card-content">
          <div class="content">
            <h3 class="is-3">{{ $user['mail'] }}さんは{{ $user['point'] }}ポイント持っています。</h3>
            <p>5ポイント消費してくじを引きますか？ </p>
            <br>
            <p>
              <strong>操作前に、一度この画面を企画本部スタッフにお見せください。</strong>
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
          </div>
        </div>
      </div>
      @else 
        <div class="notification is-warning">ポイントが不足しています！ </div>
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
      @endif 
    </div>
  </section>
</div>
<script type="text/javascript">
$(function() {
  $('input[type="button"]').on('click', function() {
     $(this).prop('disabled', true);
  });
});
</script>
@endsection