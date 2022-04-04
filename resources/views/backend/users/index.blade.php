
<!doctype html>
<html lang="tr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dashboard User Page</title>

    {{-- <link rel="stylesheet" href="{{asset('css/app.css')}}"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
  </head>
  <body>
    
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Laravel E-Commerce</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
  <div class="navbar-nav">
    <div class="nav-item text-nowrap">
      <a class="nav-link px-3" href="#">Çıkış</a>
    </div>
  </div>
</header>

<div class="container-fluid">
  <div class="row">
    <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
      <div class="position-sticky pt-3">
        <ul class="nav flex-column">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">
              <span data-feather="home"></span>
              Yönetim Paneli
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('users.index')}}">
              <span data-feather="file"></span>
              Kullanıcılar
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Kullanıcılar</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{route('users.create')}}" class="btn btn-sm btn-outline-success">Yeni ekle</a>
            </div>
        </div>

      </div>


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
                                       href="">
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
    </main>
  </div>
</div>

  <script src="{{asset('js/app.js')}}"></script>
 
  </body>
</html>
