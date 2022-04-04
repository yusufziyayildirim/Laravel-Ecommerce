@extends('backend.layouts.backend_theme')

@section('title','Kullanıcı Modülü')
@section('subtitle','Kullanıcılar')
@section('btn_url',route("users.create"))
@section('btn_label','Yeni Ekle')
@section('btn_css','success')


@section('content')
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Ad Soyad</th>
          <th scope="col">E-posta</th>
          <th scope="col">Durum</th>
          <th scope="col">İşlemler</th>
        </tr>
      </thead>
      <tbody>
          @if (count($users)>0)
            @foreach ($users as $item)
                <tr id="{{$item->user_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->email}}</td>
                    <td>
                        @if ($item->is_active==1)
                            <span class="badge bg-success">Aktif</span>
                        @else
                            <span class="badge bg-danger">Pasif</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{route('users.edit',['user' => $item->user_id])}}">
                                    <span data-feather="edit"></span>
                                    Güncelle
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-item-delete text-black"
                                    href="{{route('users.destroy',['user' => $item->user_id])}}">
                                    <span data-feather="trash-2"></span>
                                    Sil
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black"
                                  href="{{route('user.changePassword',['user' => $item->user_id])}}">
                                    <span data-feather="lock"></span>
                                    Şifre
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-black"
                                  href="{{route('addresses.index',['user'=> $item->user_id])}}">
                                    <span data-feather="map-pin"></span>
                                    Adres
                                </a>
                            </li>
                        </ul>
                    </td>
                </tr>
            @endforeach
          @else
            <tr>
                <td class="text-center" colspan="5">Kullanıcı bulunamadı</td>
            </tr>   
          @endif
        
      </tbody>
    </table>
  </div>  
@endsection
