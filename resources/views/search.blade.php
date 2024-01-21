<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net" />
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="{{URL::asset('CSS/search.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('CSS/table.css')}}" />
    <link rel="stylesheet" href="{{URL::asset('CSS/dropdown.css')}}" />

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        // <link rel="stylesheet"href = "CSS/search.css"/>
        <script src = "https://cdn.jsdelivr.net/npm/sweetalert2@11" /></script>
</head>

<body>
    @include('Common.header')
    <div class="container">
        <div class="text-center">
            <div class="row form-data">
                <div class="col-md-7 my-5 text-center">

                    <div class="heading">
                        <h1>Search Pattern</h1>
                    </div>
                    <form action="{{ route('search-data') }}" method="post">
                        @csrf
                        <!-- {{ csrf_field() }} -->

                        <div class="d-flex justify-content-center my-5">
                            <input type="hidden" name="start" value="A" id="start">
                            <input type="hidden" name="end" value="H" id="end">
                            <input placeholder="Enter series" id="search-input" class="rounded m-1 form-control" name="character"
                                onkeydown="return charOnly(event)" onkeyup="onChangeInput()"
                                oninput="this.value = this.value.toUpperCase()" maxlength="30" pattern=".{3,}"/>
                            <button type="submit" class="btn btn-primary m-1">
                                Search
                            </button>
                            @include('Common.dropdown')
                        </div>
                    </form>
                </div>
                <div class="col-md-5">
                    <img class="float-end human-illustration" src="{{URL::asset('images/searchIlustration.png')}}" />
                </div>
            </div>
            @include('Common.table', ['color' => 'false', 'id' => 0, 'Tabledata' => ''])
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
    <script src="{{URL::asset('JS/table.js')}}"></script>
    <script src="{{URL::asset('JS/dashboard.js')}}"></script>
    <script>
        trcontent(0,'A', 'H')
    </script>
</body>

</html>
