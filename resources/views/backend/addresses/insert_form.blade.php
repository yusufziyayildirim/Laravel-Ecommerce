@extends('backend.layouts.backend_theme')

@section('title','Kullanıcı Adres Modülü')
@section('subtitle','Yeni Adres')
@section('btn_url',url()->previous())
@section('btn_label','Geri Dön')
@section('btn_css','danger')

@section('content')
  <form action="{{route('addresses.store',['user' => $user->user_id]  )}}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{$user->user_id}}">
    <div class="row">
        <div class="col-lg-6">
          <label for="city" class="form-label">Şehir</label>
          <input type="text" class="form-control" id="city" name="city" value="{{old('city')}}" placeholder="Şehir giriniz">     
          @error('city')
              <span class="text-danger">{{$message}}</span>
          @enderror         
        </div>
        <div class="col-lg-6">
          <label for="district" class="form-label">İlçe</label>
          <input type="district" class="form-control" id="district" name="district" value="{{old('district')}}" placeholder="İlçe giriniz">              
          @error('district')
              <span class="text-danger">{{$message}}</span>
          @enderror    
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
          <label for="zipcode" class="form-label">Posta Kodu</label>
          <input type="text" class="form-control" id="zipcode" name="zipcode" value="{{old('zipcode')}}" placeholder="Posta kodunu giriniz">              
          @error('zipcode')
              <span class="text-danger">{{$message}}</span>
          @enderror    
        </div>
        <div class="col-6 mt-4">
          <div class="form-check">
              <input class="form-check-input" type="checkbox" id="is_default" name="is_default" value="1">
              <label class="form-check-label" for="is_default">    
                  Varsayılan Adres
              </label>          
          </div>
      </div>
    </div>
    <div class="row mt-2">
        <div class="col-12">
            <label for="address" class="form-label">Adres</label>
            <textarea class="form-control" name="address" id="address" cols="20" rows="5"></textarea>
        </div>
        @error('address')
              <span class="text-danger">{{$message}}</span>
        @enderror  
    </div>
    <div class="row">
        <div class="col-12">
            <button type="submit" class="btn btn-success mt-2">KAYDET</button>
        </div>
    </div>
  </form>
    
@endsection