<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{URL::asset('CSS/table.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <script src="{{URL::asset('JS/table.js')}}"></script>
    @include('Common.header')
    <div class="container">
        <div class="text-center">
            <div class="heading">
                <h1>Show result</h1>


            </div>
            <div class="form-data card">
                <div class="row  shadow">
                    @foreach ($result as $day)
                        <div class="col-md-6">
                            @include('Common.table', [
                                'Tabledata' => $day,
                                'id' => $loop->index,
                                'color' => 'true',
                            ])
                        </div>
                    @endforeach
                    <div class="my-5">
                        <div class="card shadow">
                            <h3 id="error"></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{URL::asset('JS/dashboard.js')}}"></script>
    <script src="{{URL::asset('JS/table.js')}}"></script>
    <script>
        if(`{{$status}}` =='No Record Found'){
             document.getElementById('error').innerHTML = "No Reord Found";
        }
    </script>

</body>

</html>
