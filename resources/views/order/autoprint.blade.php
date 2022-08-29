{{-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
    @foreach ($orders as $key=>$item)
    {{ $item->id }}
    {{ $item->order_name }}
    {{ $item->created_at }}
    {{ $item->order_note }}    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const lastprint = urlParams.get('lastprint');
        console.log(lastprint);
    </script>
    <script>
        setTimeout(function(){
            var url = new URL(window.location.href);
            url.searchParams.set('lastprint','{{ $item->id }}');
            window.location.href = url.href;
        },10000);
    </script>

    @endforeach
</body>
</html> --}}



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
        .text-print {
            color: #6a6a6a;
        }
        .logo-print {
            display: block;
            margin: 0 auto 2rem auto;
            height: 10rem;
            width: auto;
        }
        @media print {
            #app {
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
            }
            @page {
                size: 6cm 4cm;
                size: landscape;
                margin: 5mm;
            }
            .text-print-md {
                font-size: .5cm !important;
            }
            .logo-print {
                display: block;
                margin: 0 auto .8cm auto;
                height: 1.2cm;
                width: auto;
            }
        }
        
        
        
    </style>
</head> 
{{-- <body onload="window.print()">     --}}
<body>    
    @foreach ($orders as $key=>$item)
    <main id="app" class="w-100 bg-white text-print py-2 px-2 text-black">
        {{-- <h2 class="fw-bold text-center mb-3 text-black">
            <img class="logo-print" src="https://www.wish-integrate.com/HTR.png" alt="">
        </h2>     --}}
        <img class="logo-print" src="https://www.wish-integrate.com/HTR.png" alt="">    
        <div class="row text-black">
            <div class="col-12 d-print-none d-none">
                <span id="current_menuid">
                    {{ $item->id }}
                </span>
            </div>
            <div class="col-12 text-print-md">
                เมนู : <strong> {{ $item->order_name }} [ {{ $item->order_option }} {{ $item->sweet_level }} ] </strong>
            </div>
            <div class="col-12 text-print-md">
                ชื่อลูกค้า : {{ $item->name }}
            </div>
        </div><!--row-->
        
        <small class="w-100 px-1">
            <p class="text-print-md">
                <strong class="text-black">เพิ่มเติม</strong> : {{ $item->order_note }}
            </p>
        </small>
    </main>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        const urlParams = new URLSearchParams(window.location.search);
        const lastprint = urlParams.get('lastprint');
        let new_lastprint = lastprint.toString();
        console.log(new_lastprint);
        const currentIDprint = document.getElementById('current_menuid').innerHTML.trim();
        let new_currentIDprint = currentIDprint.toString();
        console.log(new_currentIDprint);

        if ( new_currentIDprint == new_lastprint  ) {
            // console.log('yes');
        } else {
            window.print();
            // console.log('yes');
        }





        async function autoReloadPage() {
            setTimeout(function(){
            var url = new URL(window.location.href);
            url.searchParams.set('lastprint','{{ $item->id }}');
            window.location.href = url.href;
            },5000);
        };
        autoReloadPage();
        
    </script>
    @endforeach
</body>
</html>