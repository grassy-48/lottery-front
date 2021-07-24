@extends('template') 
@include('parts/head') 
@include('parts/header') 
@include('parts/footer') 
@section('title', '参加情報入力フォーム') 
@section('content') 
<div class="column">
  <section class="hero is-primary" id="menu">
    <div class="column">
      <h1 class="title"> 参加情報入力フォーム </h1>
      <hr>
      <div class="column ">
        <div class="notification is-warning">
        HPの<a href="https://ymtk.xyz/loveletter/regist" target="_blank"> こちら </a>で参加宣言された内容と同じものをご記入ください
        </div>
      </div>
      <div class="card">
        <header class="card-header">
        @if ($place == 'evt') 　 
          <p class="card-header-title">イベント会場参加専用 </p>
        @else 　　
          <p class="card-header-title">オンライン参加専用 </p>
        @endif
        </header>
        <div class="card-content">
          <div class="columns">
            <div class="column">
              <form action="/entry/confirm" method="post" name="entryForm">
                <div class="field">
                  <label class="label">お名前（必須）</label>
                  <p class="control has-icons-left has-icons-right">
                    <input id="name" name="name" class="input is-rounded" type="text" placeholder="お名前" minlength="1" maxlength="32" required>
                    <span class="icon is-small is-left">
                      <i class="fa fa-user"></i>
                    </span>
                    <span class="icon is-small is-right">
                      <i class="fa fa-check"></i>
                    </span>
                  </p>
                </div>
                <div class="field">
                  <label class="label">メールアドレス（必須）</label>
                  <p class="control has-icons-left has-icons-right">
                    <input id="mail" name="mail" class="input is-rounded" type="email" placeholder="メールアドレス"  minlength="5" maxlength="64" required>
                    <span class="icon is-small is-left">
                      <i class="fa fa-envelope"></i>
                    </span>
                    <span class="icon is-small is-right">
                      <i class="fa fa-warning"></i>
                    </span>
                  </p>
                </div>
                <div class="field">
                @if ($place == 'evt') 
                  <label class="label">サークル名（必須）</label>
                  <p class="control has-icons-left has-icons-right">
                    <input id="circleName" name="circleName" class="input is-rounded" type="text" placeholder="サークル名" minlength="1" maxlength="32" required>
                    <span class="icon is-small is-right">
                      <i class="fa fa-check"></i>
                    </span>
                  </p>
                @else
                  <label class="label">サークル名</label>
                  <p class="control has-icons-left has-icons-right">
                    <input id="circleName" name="circleName" class="input is-rounded" type="text" minlength="1" maxlength="32" placeholder="サークル名">
                    <span class="icon is-small is-right">
                      <i class="fa fa-check"></i>
                    </span>
                  </p>
                @endif
                </div>
                <div class="field">
                  <input type="hidden" name="place" value="{{$place}}">
                  <input type="submit" class="button is-outlined" value="確認する">
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
<script type="text/javascript">
$(function() {
    $("#entryForm").validate();
})
</script>
@endsection