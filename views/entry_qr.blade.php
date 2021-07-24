@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', '登録完了') 
@section('content')
<div class="column">
<section class="hero is-primary" id="menu">
  <div class="column">
    <h1 class="title">登録が完了しました！ </h1>
    <hr>
    <div class="card">
      <div class="card-content">　 
        <div class="columns">
          <div class="column">
            <article class="message is-dark">
              <div class="message-header">
                <p>このQRコードは{{$user['name']}} 様専用となっております。ご自身でDLして、作成したペーパーにおつけください！ </p>
              </div>
              <div class="message-body">ペーパー１種につき１つのQRコードをお使いください。６種以上のペーパーを作成される方は、主催までご連絡ください。<br />
                万が一、DL前にこのページを閉じてしまった場合は、再度同じメールアドレスでご登録ください。<br />
                <strong>※ペーパー作成後、必ずご自身のスマートフォンでQRコードが読み取り可能であることをご確認ください。(ご自分のコードでもポイントは付与されます)</strong><br />
              </div>
            </article>
          </div>
        </div>
        <hr>
        <div class="column">
          <nav class="panel">
            <p class="panel-heading">{{$user['name']}} 様　専用QRコード / 5種(全て違うコードです)</p>
            <div class="panel-block">
            <div class="columns is-mobile is-multiline">
            @foreach ($code_img as $code) 
            @if (!$loop->last)
              <div class="column">
                <div class='card equal-height'>
                  <div class="card-content has-text-centered">
                    <figure class="image is-128x128 is-inline-block">
                      <img src="{{$code['img']}}">
                    </figure>
                  </div>
                </div>
              </div>
            @endif 
            @endforeach 
            </div>
            </div>
          </nav>
        </div>
      </div>
    </div>
    <div class="column">
      <a class="button is-small" href="/">TOPへもどる </a>
    </div>
  </section>
</div>
@endsection