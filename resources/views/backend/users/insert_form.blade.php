@extends('backend.layouts.backend_theme')

@section('title','Kullanıcı Modülü')
@section('subtitle','Yeni Kullanıcı')
@section('btn_url',url()->previous())
@section('btn_label','Geri Dön')
@section('btn_css','danger')

@section('content')
  <form action="{{route('users.store')}}" method="POST">
    @csrf
    <div class="row">
        <div class="col-lg-6">
          <label for="name" class="form-label">Ad Soyad</label>
          <input type="text" class="form-control" id="name" name="name" value="{{old('name')}}" placeholder="Ad soyad giriniz">     
          @error('name')
              <span class="text-danger">{{$message}}</span>
          @enderror         
        </div>
        <div class="col-lg-6">
          <label for="email" class="form-label">E-posta</label>
          <input type="email" class="form-control" id="email" name="email" value="{{old('email')}}" placeholder="E-posta giriniz">              
          @error('email')
              <span class="text-danger">{{$message}}</span>
          @enderror    
        </div>
    </div>
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
    <div class="row mt-2">
        <div class="col-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_admin" name="is_admin" value="1">
                <label class="form-check-label" for="is_admin">    
                    Yetkili Kullanıcı
                </label>          
            </div>
        </div>
        <div class="col-6">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1">
                <label class="form-check-label" for="is_active">    
                    Aktif
                </label>          
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