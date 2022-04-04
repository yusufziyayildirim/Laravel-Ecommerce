@extends('backend.layouts.backend_theme')

@section('title','Kullanıcı Adres Modülü')
@section('subtitle','Yeni Adres')
@section('btn_url',url()->previous())
@section('btn_label','Geri Dön')
@section('btn_css','danger')

@section('content')
  <form action="{{route('categories.store')}}" method="POST">
    @csrf
    <div class="row">
      <div class="col-lg-6">
          <div class="mt-2">
              <x-input label="Kategori Adı" placeholder="Kategori adını giriniz" field="name"/>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="mt-2">
              <x-input label="Slug" placeholder="Kategori slug giriniz" field="slug"/>
          </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="col-lg-6">
                <x-checkbox field="is_active" label="Aktif Kategori"/>
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