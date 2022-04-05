@extends("backend.layouts.backend_theme")
@section("title","Ürünler Modülü")
@section("subtitle","Fotoğraf Güncelle")
@section("btn_url",url()->previous())
@section("btn_label","Geri Dön")
@section("btn_css","danger")
@section("content")
    <form action="{{route("images.update",['product' => $product->product_id , 'image' => $image->image_id])}}" method="POST" autocomplete="off"
          enctype="multipart/form-data" novalidate>
        @csrf
        @method("PUT")
        <input type="hidden" name="product_id" value="{{$product->product_id}}">
        <input type="hidden" name="address_id" value="{{$image->image_id}}">
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Dosya Yükle" placeholder="" field="image_url" type="file"/>
                    <img src="{{asset("/storage/products/$image->image_url")}}" alt="{{$image->alt}}" width="100">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Açıklama" placeholder="Kısa açıklama girinizi" field="alt" value="{{$image->alt}}"/>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="mt-2">
                    <x-input label="Sıra No" placeholder="Sıra no giriniz" field="seq" value="{{$image->seq}}"/>
                </div>
            </div>
            <div class="col-lg-6">
                <x-checkbox field="is_active" label="Aktif" checked="{{$image->is_active == 1}}"/>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary mt-2"><span data-feather="save"></span> KAYDET</button>
            </div>
        </div>
    </form>
@endsection
