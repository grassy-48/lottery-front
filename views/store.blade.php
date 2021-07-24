@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', 'ポイントゲット') 
@section('content')
<div class="column">
  <section class="hero is-primary" id="menu">
    <div class="column">
      <h1 class="title"> ポイントをゲットする </h1>
      <hr>
      @if (!empty($code)) 
      <div class="column ">
        <div class="notification is-warning">
          <p>※必ず毎回同じメールアドレスを入力してください。メールアドレスを間違えるとポイントが加算されません 
        </div>
      </div>
      @endif
      <div class="card">
        <div class="card-content">
          <div class="columns">
            <div class="column">
            @if (!empty($code)) 
              <form action="/store/check" method="post">
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
                  <input type="hidden" name="code" value="{{$code}}">
                  <input type="submit" class="button is-primary" value="ポイントをゲットする">
                </div>
              </form>
              @else 
              <div class="column">
                <p>QRコード情報が取得できません。
                </p>
                <p>ご自分のスマートフォンのカメラアプリで、ペーパーについているQRコードを読み込んでください。
                </p>
              </div>
              <div class="field">
                <input type="button" value="戻る" onClick="history.back()" class="button is-light">
              </div> 
              @endif 
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