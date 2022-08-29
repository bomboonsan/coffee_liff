<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Order</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@300;400&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Noto Sans Thai', sans-serif;
        }
        .text-line {
            color: #00b900;
        }
    </style>
</head> 
<body>    
    <main id="app" class="w-100 py-3">
      <div id="outProcess" class=" d-none">
          <div class="row justify-content-center">
            <div class="col-10 py-5">
              <h2 class="text-center fw-bold text-danger">
                ขออภัย! คุณสั่งกำหนดแล้ว
              </h2>
            </div>
          </div>
      </div><!--outProcess-->
      <div id="inProcess" class="container">
        @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                    <br> 
                    <div>
                        Order ID #{{ session('orderOutput_id') }} <br> ชื่อลูกค้า: {{ session('orderOutput_name') }} <br> รายการที่สั่ง: {{ session('orderOutput_order') }}
                    </div>
                    <div class="mt-4">
                        <button class="btn btn-sm btn-success" id="btnMsg" onclick="sendMsg()">บันทึก</button>
                    </div>
                    
                </div>
          @endif
          <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="d-none">
                <input type="text" id="displayName_original" name="line_displayName" class="form-control mb-2" placeholder="" value="Line_name">
                <input type="text" id="my_userId" name="line_userId" class="form-control mb-2" placeholder="" value="Line_userID">
                <input type="text" id="my_pictureUrl" name="line_thumbnailUrl" class="form-control mb-2" placeholder="" value="Line_image">
            </div>
            <div id="main-order">
              <h1 class="text-center mt-4 fs-4 fw-bold">
                Menarini Booth
              </h1>
              <img class="d-block mx-auto mt-1 mb-3" width="100" height="auto" src="https://www.img.in.th/images/a6b050f7ab68e54a26d8b7071f18fb7d.jpg" alt="" />
                <div class="mb-4">
                    <select id="orderMenu" class="form-select" name="order_name" aria-label="Default select example">
                        <option selected>โปรดเลือกเมนูเครื่องดื่ม</option>
                        {{-- <option value="เอสเพรสโซ">เอสเพรสโซ</option>
                        <option value="อเมริกาโน่">อเมริกาโน่</option>
                        <option value="ลาเต้">ลาเต้</option>
                        <option value="คาปูชิโน">คาปูชิโน</option>
                        <option value="มอคค่า">มอคค่า</option>
                        <option value="มัคคิอาโต้">มัคคิอาโต้</option>
                        <option value="มัชฉะ">มัชฉะ</option>
                        <option value="ช้อคโกแลต">ช้อคโกแลต</option> --}}
                        @foreach ($menus as $key=>$item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <select id="order_option" class="form-select" name="order_option" aria-label="Default select example">
                        <option selected>ร้อน / เย็น</option>
                        <option value="ร้อน">ร้อน</option>
                        <option value="เย็น">เย็น</option>
                    </select>
                </div>
                <div class="mb-2">
                    <select id="sweet" class="form-select" name="sweet_level" aria-label="Default select example">
                        <option selected>โปรดเลือกระดับความหวาน</option>
                        <option value="ไม่หวาน">ไม่หวาน</option>
                        <option value="หวานน้อย">หวานน้อย</option>
                        <option value="ปกติ">ปกติ</option>
                        <option value="เพิ่มหวาน">เพิ่มหวาน</option>
                    </select>
                </div>
            </div><!--#main-order-->
            <div id="order-detail" class="d-none">
                <div class="mb-2">
                    <img id="set_pictureUrl" class="d-block mx-auto rounded-circle overflow-hidden" style="max-width: 25vw;height: auto;">
                </div>
                <div class="mb-2">
                    <label for="displayName" class="form-label mb-0 pb-0 mt-1 text-center d-block text-black-50">
                        ชื่อ
                        <small><br>*สามารถเปลี่ยนแปลงได้</small>
                    </label>
                    <input type="text" name="name" class="form-control text-line text-center" id="my_displayName" placeholder="ระบุชื่อ" value="Line_name">
                </div>
                <div class="mb-2">
                    <label for="" class="form-label mb-0 pb-0 mt-1 text-center d-block text-black-50">
                        <small>หมายเหตุ (หากมี)</small>
                    </label>
                    <input class="form-control" name="order_note" rows="2" placeholder="หมายเหตุ" value="ไม่มี">
                </div>
                <div class="mb-2 text-center">
                    <button type="submit" class="btn btn-primary px-4">สั่ง</button>
                </div>    
            </div><!--#order-detail-->          
        </form>
      </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
      var selectDetect1 = 0;
      var selectDetect2 = 0;
      $('#orderMenu').change(function () {
      // var job =  $('#orderMenu').val();
      // alert(job);
      selectDetect1 = 1;
      if ( selectDetect1 ==1 && selectDetect2 ==1 ) {
          $( "#main-order" ).addClass( '');
          $( "#main-order" ).addClass( 'd-none');
          $( "#order-detail" ).removeClass( 'd-none');
          
      }
      })
      $('#sweet').change(function () {
      selectDetect2 = 1;
      if ( selectDetect1 ==1 && selectDetect2 ==1 ) {
          $( "#main-order" ).addClass( '');
          $( "#main-order" ).addClass( 'd-none');
          $( "#order-detail" ).removeClass( 'd-none');
      }
      })


      $( "#submit" ).click(function() {
          setTimeout(
          function() 
          {
              closed();
          }, 3000);
      });
      
  </script>
        
</body>
</html>