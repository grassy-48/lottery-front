@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', 'くじを引く') 
@section('content')
<div class="column">
  <section class="hero is-primary" id="menu">
    <div class="column">
      <h1 class="title"> 集めたポイントを使ってくじを引く </h1>
      <hr>
      <div class="column ">
        <div class="notification is-warning">
          <p>※必ずポイントを集めたメールアドレスと同じものを入力してください 
        </div>
      </div>
      <div class="card">
        <div class="card-content">
          <div class="columns">
            <div class="column">
              <form>
                <div class="field">
                  <label class="label">メールアドレス（必須）</label>
                  <p class="control has-icons-left has-icons-right" />
                  <input id="mail" name="mail" class="input is-rounded" type="email" placeholder="メールアドレス" minlength="5" maxlength="64" required>
                  <span class="icon is-small is-left">
                    <i class="fa fa-envelope"></i>
                  </span>
                  <span class="icon is-small is-right">
                    <i class="fa fa-warning"></i>
                  </span>
                  </p>
                </div>
                <div class="field">
                  <input class="button is-primary" type="submit" value="イベント会場で引く" formaction="/draw/evt/confirm" formmethod="POST"/>
                </div>
                <div class="field">
                  <input class="button is-warning" type="submit" value="オンラインで引く" formaction="/draw/onl/confirm" formmethod="POST"/>	
                </div>
              </form>
              </div>
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