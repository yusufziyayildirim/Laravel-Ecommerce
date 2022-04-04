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
          <label for="password" class="form-label">Şifre</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Şifre giriniz">              
          @error('password')
              <span class="text-danger">{{$message}}</span>
          @enderror    
        </div>
        <div class="col-lg-6">
          <label for="password_confirmation" class="form-label">Şifre Tekar</label>
          <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Şifreyi tekrar giriniz">              
          @error('password')
            <span class="text-danger">{{$message}}</span>
          @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-success mt-2">KAYDET</button>
        </div>
    </div>
  </form>
@endsection
