@extends('backend.layouts.backend_theme')

@section('title','Kullanıcı Modülü')
@section('subtitle','Kullanıcı Güncelle')
@section('btn_url',url()->previous())
@section('btn_label','Geri Dön')
@section('btn_css','danger')

@section('content')
  <form action="{{route('categories.update',['category' => $category->category_id] )}}" method="POST">
    @csrf
    @method('PUT')
    <input type="hidden" name="category_id" value="{{$category->category_id}}">
    <div class="row">
      <div class="col-lg-6">
          <div class="mt-2">
              <x-input label="Kategori Ad" placeholder="Kategori adı giriniz" field="name" value="{{$category->name}}"/>
          </div>
      </div>
      <div class="col-lg-6">
          <div class="mt-2">
              <x-input label="Slug" placeholder="Slug giriniz" field="slug" value="{{$category->slug}}"/>
          </div>
      </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="col-lg-12">
                <x-checkbox field="is_active" label="Aktif Kategori" checked="{{$category->is_active == 1}}"/>
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
