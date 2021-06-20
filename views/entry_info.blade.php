@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')
<div class="column">
<section class="section" id="form">
<h1 class="title"> 参加情報入力フォーム </h1>
@if ($place == 'evt')
  　<h3 class="subtitle is-3"> イベント会場参加専用 </h3>
@else
　　<h3 class="subtitle is-3"> オンライン参加専用 </h3>
@endif
  <hr>
  <div class="columns">
  <div class="column">
  <form action="/entry/confirm" method="post">
      <div class="field">
        <label class="label">お名前（必須）</label>
        <p class="control has-icons-left has-icons-right">
          <input id="name" name="name" class="input is-rounded" type="text" placeholder="お名前">
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
          <input id="mail" name="mail" class="input is-rounded" type="email" placeholder="メールアドレス">
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
@else
　　		<label class="label">サークル名</label>
@endif
        <p class="control has-icons-left has-icons-right">
          <input id="circleName" name="circleName" class="input is-rounded" type="text" placeholder="サークル名">
	      <span class="icon is-small is-left">
            <i class="fa fa-user"></i>
          </span>
          <span class="icon is-small is-right">
            <i class="fa fa-check"></i>
          </span>
		</p>
      </div>
      <div class="field">	
	   	<input type="hidden" name="place" value="{{$place}}">
		<input type="submit" class="button is-outlined" value="確認する"> 
      </div>
	</form>
    </div>
	</div>
</section>
</div>
@endsection