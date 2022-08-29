<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MENU SETTING</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
            background-color: #f4f4f4;
        }
        .text-line {
            color: #00b900;
        }
        .hr {
            content: '';
            width: 5rem;
            height: 5px;
            margin-top: .5rem;
            background-color: #198754;
        }
    </style>
</head> 
<body>    
    <nav class="navbar navbar-expand-lg bg-white shadow-sm">
        <div class="container">
          <a class="navbar-brand" href="#">
            <img src="https://www.img.in.th/images/a6b050f7ab68e54a26d8b7071f18fb7d.jpg" alt="" width="auto" height="35">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link" href="{{url('/order/show/')}}">รายการที่สั่ง</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/menu/')}}">จัดการเมนู</a>
              </li>
            </ul>
          </div>
        </div>
    </nav>
    <main id="menu" class="w-100 py-4 my-4">
        <div class="container">
            <h1 class="text-center fs-2 fw-bold text-dark mb-0">
                ตั้งค่าเมนู
            </h1>
            <div class="mx-auto hr mb-5 rounded-5">

            </div>
            <div class="row">
                <section class="col-8 pb-4">
                    <div class="w-100 p-3 bg-white rounded-3 shadow-sm">
                        <table class="table">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">MENU</th>
                                <th scope="col"></th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $key=>$item)
                                <tr>
                                    <th scope="row">{{ ++$key }}</th>
                                    <td>{{ $item->name }}</td>
                                    <td class="text-end">
                                        <form action="{{ route('menu.destroy' , $item->id ) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm px-2 py-1 btn-danger"><i class="fa-solid fa-trash-can"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </section>
                <section class="col-4 pb-4">
                    <div class="w-100 p-3 bg-white rounded-3 shadow-sm">
                        <h2 class="fs-5 mb-3 fw-bold text-start">
                            เพิ่มรายชื่อเมนู
                        </h2>
                        @if (session('status'))
                            <div class="my-2">
                                <div class="alert alert-success">
                                    {{ session('status') }}
                                </div>
                            </div>
                        @endif
                        <form action="{{ route('menu.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="menu-name" class="form-label d-none">ชื่อเมนู</label>
                                <input type="text" class="form-control" id="menu-name" name="name" placeholder="ระบุชื่อเมนู">
                            </div>
                            <div class="text-start">
                                <button type="submit" class="btn  px-4 py-1 btn-primary"><i class="fa-solid fa-plus"></i> เพิ่ม</button>
                            </div>
                        </form>
                    </div>                    
                </section>
            </div>
        </div><!--container-->
    </main>
        
</body>
</html>