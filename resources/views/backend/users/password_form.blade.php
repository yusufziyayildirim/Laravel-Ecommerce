@extends('backend.layouts.backend_theme')

@section('title','Kullanıcı Modülü')
@section('subtitle','Şifre Değiştir')
@section('btn_url',url()->previous())
@section('btn_label','Geri Dön')
@section('btn_css','danger')

@section('content')
  <form action="{{route('user.changePassword',['user' => $user->user_id])}}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{$user->user_id}}">
    <div class="row">
      <div class="col-lg-6">
          <div class="mt-2">
              <x-input label="Şifre Giriniz" placeholder="Şifre giriniz" field="password" type="password"/>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="mt-2">
              <x-input label="Şifre Tekrarı" placeholder="Şifrenizi tekrar giriniz" field="password_confirmation"
                       type="password"/>
          </div>
      </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-success mt-2">KAYDET</button>
        </div>
    </div>
  </form>
@endsection
