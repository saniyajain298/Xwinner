<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="https://code.jquery.com/jquery-3.7.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="CSS/dashboard.css" />
    <link rel="stylesheet" href="CSS/dropdown.css" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    @include('Common.header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <img src="images/insert.png" class="side-human" alt="insert images" width="100%" />
            </div>
            <div class="col-md-6 my-5">
                <div class="text-center">
                    <h1>Update winners record</h1>
                    <div>
                        <h2>Preview last 30 record {{$preview}}</h2>
                        <p id="preview"></p>
                        <div id="button-remove">
                            <button onclick="removeSeries('{{$preview}}')" class="btn btn-primary">Remove {{$preview}}</button>
                        </div>
                    </div>
                    <div class="heading">
                        <h2>Insert data</h2>
                    </div>
                    <div class="form-data">

                        <form action="{{ route('save') }}" method="post" onsubmit="return submitSeries()">
                            @csrf <!-- {{ csrf_field() }} -->
                            <div class="d-flex justify-content-center">
                                <input type='hidden' name='pattern' value="{{$preview}}" id="series">
                                <input placeholder="Enter new series character" id="inputseries" class="rounded form-control"
                                    name ="character" onkeydown="return charOnly(event)"
                                    oninput="this.value = this.value.toUpperCase()" minlength="1" maxlength="1" />
                                <button type="submit" class=" ms-2 btn btn-primary">Submit</button>
                                <div class="dropdown dropdown1">
                                    <button class="btn btn-primary ms-1 dropdown-toggle" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        {{$preview}}
                                    </button>
                                    <ul class="dropdown-menu" id='inner-dropdown' aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" onclick="changeSeries('AH')">AH</a></li>
                                        <li><a class="dropdown-item" onclick="changeSeries('BR')">BR</a></li>
                                    </ul>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="JS/dashboard.js"></script>
    <script>


        // function updateDropdown(){
        //     var first='AH', second='BR'
        //     if('{{$preview}}' == 'BR'){
        //         first='BR'
        //         second='AH'
        //     }
        //     html =` <li><a class="dropdown-item" onclick="changeSeries(${first})">${first}</a></li>`

        //     document.getElementById('inner-dropdown').innerHTML() = html;
        // }


        function changeSeries(series) {
            document.getElementById('dropdownMenuButton1').textContent = series
            document.getElementById('series').value = series
            document.getElementById('button-remove').innerHTML = `<button class="btn btn-primary" onclick="removeSeries('${series}')">Remove ${series}</button>`
            gerPreview(series)
        }
        gerPreview('{{$preview}}')
        console.log('{{$preview}}')
        function gerPreview(series) {
            if(series ==='AH'){
                routeurl = "{{ route('last_result', 'AH') }}"
            }
            else {
                routeurl = "{{ route('last_result', 'BR') }}"
            }
            $.ajax({
                    url: routeurl,
                    type: 'GET',
                    data:{'pattern':'BR'},
                    success: function(res) {
                        $("#preview").html(res);
                    }
                }
            );
        }
        function removeSeries(series){
            if(series ==='AH'){
                routeurl = "{{ route('remove_last_character', 'AH') }}"
            }
            else {
                routeurl = "{{ route('remove_last_character', 'BR') }}"
            }
            $.ajax({
                    url: routeurl,
                    type: 'get',
                    data:{'pattern':'BR'},
                    success: function(res) {
                        gerPreview(series)
                    }
                }
            );
        }
    </script>

</html>
