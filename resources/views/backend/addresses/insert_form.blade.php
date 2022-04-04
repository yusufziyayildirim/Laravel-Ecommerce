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
          <div class="mt-2">
              <x-input label="Şehir" placeholder="Şehir giriniz" field="city"/>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="mt-2">
              <x-input label="İlçe" placeholder="İlçe giriniz" field="district"/>
          </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="mt-2">
                <x-input label="Posta Kodu" placeholder="Posta kodu giriniz" field="zipcode"/>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="col-lg-6">
                <x-checkbox field="is_default" label="Varsayılan"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="mt-4">
                <x-textarea label="Açık Adres" placeholder="Açık adres giriniz" field="address"/>
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