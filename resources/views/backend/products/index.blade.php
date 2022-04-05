@extends("backend.layouts.backend_theme")
@section("title","Ürün Modülü")
@section("subtitle","Ürünler")
@section("btn_url",route("products.create"))
@section("btn_label","Yeni Ekle")
@section("btn_css","success")
@section("content")
    <table class="table table-striped table-sm">
        <thead>
        <tr>
            <th scope="col">Sıra No</th>
            <th scope="col">Ürün Adı</th>
            <th scope="col">Kategori</th>
            <th scope="col">Fiyat</th>
            <th scope="col">Eski Fiyat</th>
            <th scope="col">Durum</th>
            <th scope="col">İşlemler</th>
        </tr>
        </thead>
        <tbody>
        @if(count($products) > 0)
            @foreach($products as $item)
                <tr id="{{$item->product_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->category->name}}</td>
                    <td>{{$item->price}}</td>
                    <td>{{$item->old_price}}</td>
                    <td>
                        @if($item->is_active == 1)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{route('products.edit',['product' => $item->product_id])}}">
                                    <span data-feather="edit"></span>
                                    Güncelle
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-item-delete text-black"
                                   href="{{route('products.destroy',['product' => $item->product_id])}}">
                                    <span data-feather="trash-2"></span>
                                    Sil
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black"
                                   href="">
                                    <span data-feather="image"></span>
                                    Fotoğraflar
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
        @else
            <tr>
                <td colspan="7">
                    <p class="text-center">Herhangi bir kayıt bulunamadı.</p>
                </td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
