@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')
<div class="column">
<section class="section" id="menu">
  <h1 class="title"> 集めたポイントを使ってくじを引く </h1>
  <hr>
  <div class="columns">
  <div class="column">
  <form action="/store/check" method="post">
      <div class="field">
        <label class="label">メールアドレス（必須）</label>
        <p class="control has-icons-left has-icons-right">
          <input id="mail" name="mail" class="input is-rounded" type="email" placeholder="メールアドレス">
          <span class="icon is-small is-left">
            <i class="fa fa-envelope"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fa fa-warning"></i>
          </span>
        </p>
      </div>
	  <p>※必ず毎回同じメールアドレスを入力してください。
      <div class="field">
      <input class="button is-primary" type="submit" value="イベント会場で引く" formaction="/draw/evt/confirm" formmethod="POST"/>
        <input class="button is-warning" type="submit" value="オンラインで引く" formaction="/draw/onl/confirm" formmethod="POST"/>	
      </div>
  </form>
  </div>
  </div>
</section>
</div>
@endsection