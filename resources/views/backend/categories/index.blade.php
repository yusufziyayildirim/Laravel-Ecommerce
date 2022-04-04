@extends('backend.layouts.backend_theme')

@section('title','Kategori Modülü')
@section('subtitle','Kategoriler')
@section('btn_url',route("categories.create"))
@section('btn_label','Yeni Ekle')
@section('btn_css','success')


@section('content')
  <div class="table-responsive">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Adı</th>
          <th scope="col">Slug</th>
          <th scope="col">Durum</th>
          <th scope="col">İşlemler</th>
        </tr>
      </thead>
      <tbody>
          @if (count($categories)>0)
            @foreach ($categories as $item)
                <tr id="{{$item->category_id}}">
                    <td>{{$loop->iteration}}</td>
                    <td>{{$item->name}}</td>
                    <td>{{$item->slug}}</td>
                    <td>
                        @if ($item->is_active==1)
                            <span class="badge bg-success">Evet</span>
                        @else
                            <span class="badge bg-danger">Hayır</span>
                        @endif
                    </td>
                    <td>
                        <ul class="nav float-start">
                            <li class="nav-item">
                                <a class="nav-link text-black" href="{{route('categories.edit',['category' => $item->category_id])}}">
                                    <span data-feather="edit"></span>
                                    Güncelle
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link list-item-delete text-black"
                                    href="{{route('categories.destroy',['category' => $item->category_id])}}">
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
                <td class="text-center" colspan="5">Kategori bilgisi bulunamadı</td>
            </tr>   
          @endif
        
      </tbody>
    </table>
  </div>  
@endsection
