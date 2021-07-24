@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('title', '入力内容確') 
@section('content')
<div class="help column">
  <section class="hero is-primary" id="menu">
    <div class="column">
      <h1 class="title"> 入力内容確認 </h1>
      <hr>
      <div class="card">
        <div class="card-content">　
          <table class="table is-narrow">
            <tbody>
              <tr>
                <td>
                  <b>参加場所</b>
                </td>
                <td>@if ($place == 'evt') イベント会場で参加 @else オンラインのみで参加 @endif </td>
              </tr>
              <tr>
                <td>
                  <b>お名前</b>
                </td>
                <td>{{ $name }} </td>
              </tr>
              <tr>
                <td>
                  <b>メール</b>
                </td>
                <td>{{ $mail }} </td>
              </tr>
              <tr>
                <td>
                  <b>サークル名</b>
                </td>
                <td>{{ $circleName }} </td>
              </tr>
            </tbody>
          </table>
          <form action="/entry/qr-code" method="post">
            <input type="hidden" name="mail" value="{{$mail}}">
            <input type="hidden" name="name" value="{{$name}}">
            <input type="hidden" name="circleName" value="{{$circleName}}">
            <input type="hidden" name="place" value="{{$place}}">
            <input type="hidden" name="type" value="{{$type}}">
            <div class="field">
              <input type="button" value="キャンセル" onClick="history.back()" class="button is-light">
　　
              <input type="submit" class="button is-primary" value="登録する">
              <p class="help is-danger">※登録ボタン押下後、30秒ほどそのままお待ち下さい。</p>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection