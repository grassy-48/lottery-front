@extends('template')
@include('parts/head')
@include('parts/header')
@include('parts/footer')
@section('content')

<div class="column">
<section class="section" id="form">
<h1 class="title">
	入力内容確認
</h1>
<hr>
　<table class="table is-narrow">
    <tbody>
      <tr>
        <td> <b>参加場所</b> </td>
        <td> 
@if ($place == 'evt')
イベント会場で参加
@else
オンラインのみで参加
@endif			
　　　　</td>
      </tr>
      <tr>
	    <td> <b>お名前</b> </td>
        <td> {{ $name }} </td>
      </tr>
      <tr>
	    <td> <b>メール</b> </td>
        <td> {{ $mail }} </td>
      </tr>
	  <tr>
	    <td> <b>サークル名</b> </td>
        <td> {{ $circleName }} </td>
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
		<input type="submit" class="button is-primary" value="登録する"> 
</div>
</form>
</section>
</div>


@endsection