@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')
<div class="column">
<section class="section" id="form">
<div class="notification is-danger">
    エラーが発生しました！！
</div>
<div class="column">
<article class="message is-warning">
        <div class="message-header">
          <p>
          ErrorCode： {{ $code }}
          </p>
        </div>
        <div class="message-body">
        Errorメッセージ: {{ $message }}
        </div>
</article>
<p>エラー内容に心当たりがない場合は、もう一度同じ操作を繰り返してください。</p>
<p>解消しない場合は上記のErrorCodeをつけて、主催までごお問い合わせください。</p>
</div>
<div class="column">
<a class="button is-small" href="/"> TOPへもどる </a>
</div>
</div>
@endsection
