<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=1, initial-scale=1.0" />
    <!-- font-awosome cdn -->
    <script src="https://kit.fontawesome.com/0ffd30f08f.js" crossorigin="anonymous"></script>
    <!-- css cdn -->
   
    <!-- bootstrap cdn -->
    <link href="{{asset('assets/FrontEnd/css/eocjs-newsticker.css')}}" rel="stylesheet">
    <!-- select -->
    <link href="{{asset('assets/BackEnd/plugins/select2/css/select2.min.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/BackEnd/plugins/select2/css/select2-bootstrap4.css')}}" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset('assets/FrontEnd/css/style.css')}}" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/FrontEnd/js/jquery.min.js')}}"></script>
    <script src="{{asset('assets/FrontEnd/js/eocjs-newsticker.js')}}"></script>
    <script src="{{asset('assets/BackEnd/plugins/select2/js/select2.min.js')}}"></script>
    <title>{{ config('company.company_name') }}</title>
</head>

<body>
    <div class="container main-body">
        <header>
            @include('FrontEnd.layouts.header')
        </header>
        <main>
            @yield('content')
        </main>
        @include('FrontEnd.layouts.footer')
    </div>
</body>

</html>