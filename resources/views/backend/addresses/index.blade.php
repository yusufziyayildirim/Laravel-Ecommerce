@extends('backend.layouts.backend_theme')

@section('title','Kullanıcı Adres Modülü')
@section('subtitle','Adresler')
@section('btn_url',route("addresses.create",['user' => $user]))
@section('btn_label','Yeni Ekle')
@section('btn_css','success')


@section('content')
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Şehir</th>
          <th scope="col">İlçe</th>
          <th scope="col">Posta Kodu</th>
          <th scope="col">Açık Adres</th>
          <th scope="col">Varsayılan</th>
          <th scope="col">İşlemler</th>
        </tr>
      </thead>
      <tbody>
          @if (count($addrs)>0)
            @foreach ($addrs as $item)
                <tr id="{{$item->address_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->city}}</td>
                    <td>{{$item->district}}</td>
                    <td>{{$item->zipcode}}</td>
                    <td>{{$item->address}}</td>
                    <td>
                        @if ($item->is_default==1)
                            <span class="badge bg-success">Evet</span>
                        @else
                            <span class="badge bg-danger">Hayır</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{route('addresses.edit',['user' => $user, 'address' => $item->address_id])}}">
                                    <span data-feather="edit"></span>
                                    Güncelle
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-item-delete text-black"
                                    href="{{route('addresses.destroy',['user' => $user, 'address' => $item->address_id])}}">
                                    <span data-feather="trash-2"></span>
                                    Sil
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
          @else
            <tr>
                <td class="text-center" colspan="7">Adres bilgisi bulunamadı</td>
            </tr>   
          @endif
        
      </tbody>
    </table>
  </div>  
@endsection
