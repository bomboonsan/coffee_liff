<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
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
        @page {
            /* size: 20cm 10cm; */
            /* size: 20cm 5cm; */
            size: 100% auto;
            /* margin: 5mm 5mm 0mm 5mm; */
            margin: 0mm 0mm 0mm 0mm;
            
            /* size: auto; */
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
    <div class="container">
        <h1 class="text-center mt-5 mb-0 fs-4 fw-bold">
            รายการที่สั่ง
        </h1>
        <div class="mx-auto hr mb-3 rounded-5">

        </div>
        <div class="text-center mb-5">
            <a href="{{url('/autoprint?lastprint=start')}}" target="_blank" class="btn btn-lg btn-success rounded-3" ><i class="fa-solid fa-print me-1"></i> AUTO PRINT</a>
        </div>
        <div class="w-100 p-3 bg-white rounded-3 shadow-sm">
        <table class="table">
            <thead>
              <tr>
                <th scope="col" style="width: 5%" class="text-center">ลำดับ</th>
                <th scope="col" class="text-center">รูป</th>
                <th scope="col" class="text-center">ชื่อลูกค้า</th>
                <th scope="col" class="text-center">เมนู</th>
                <th scope="col" class="text-center">เพิ่มเติม</th>                
                <th scope="col" class="text-center"></th>
              </tr>
            </thead>
            <tbody>
            @foreach ($orders as $key=>$item)
                <tr>
                    <th scope="row" class="text-center">{{ ++$key }}</th>
                    <th class="text-center">
                        <a href="{{ $item->line_thumbnailUrl }}" target="_blank"><img class="d-block mx-auto rounded-circle overflow-hidden" src="{{ $item->line_thumbnailUrl }}" alt="" style="max-width: 3rem;height: auto;"></a>                        
                    </th>
                    <td class="text-center">{{ $item->name }}</td>
                    <td class="text-center">
                        {{ $item->order_name }}  [ {{ $item->order_option }} ] {{ $item->sweet_level }}
                    </td>                    
                    <td class="text-center">{{ $item->order_note }}</td>
                    <td class="d-print-none">       
                        <a class="text-black-50" href="{{url('/print/'.$item->id)}}"><i class="fa-solid fa-print fs-4"></i></a>
                    </td>
                </tr>
            @endforeach
            </tbody>
          </table>
        </div>
    </div><!--cotnainer-->
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
</body>
</html>